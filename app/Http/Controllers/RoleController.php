<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view roles', only: ['index']),
            new Middleware('permission:edit roles', only: ['edit']),
            new Middleware('permission:create roles', only: ['create']),
            new Middleware('permission:delete roles', only: ['destroy']),
        ];
    }

    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(10);
        return view('roles.list', [
            'roles' => $roles
        ]);
    }


    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create', [
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.list')->with('success', 'Roles Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'ASC')->get();
        // dd($hasPermissions);
        return view('roles.edit', [
            'permissions' => $permissions,
            'hasPermissions' => $hasPermissions,
            'role' => $role
        ]);
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                // Menggunakan sync untuk menambahkan permission baru tanpa menghapus yang sudah ada
                $role->syncPermissions($request->permission);
            } else {
                // Jika tidak ada permission yang dipilih, hapus semua permission
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.list')->with('success', 'Role Edited Succesfully.');
        } else {
            return redirect()->route('roles.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);

        if ($role == null) {
            session()->flash('error', 'Role not found');
            return response()->json([
                'status' => false
            ]);
        }
        $role->delete();

        session()->flash('success', 'Role Deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
