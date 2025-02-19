<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permissions', only: ['index']),
            new Middleware('permission:edit permissions', only: ['edit']),
            new Middleware('permission:create permissions', only: ['create']),
            new Middleware('permission:delete permissions', only: ['destroy']),
        ];
    }

    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'asc')->paginate(5);
        return view('permissions.list', [
            'permissions' => $permissions
        ]);
    }
    public function create()
    {
        return view('permissions.create');
    }
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), ['name' => 'required|unique:permissions|min:3']);

    //     if ($validator->passes()) {
    //         Permission::create(['name' => $request->name]);
    //         return redirect()->route('permissions.index')->with('success', 'Permissions Added Success.');
    //     } else {
    //         return redirect()->route('permissions.create')->withInput()->withErrors($validator);
    //     }
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'permissions' => 'required|array|min:1'
        ]);

        if ($validator->passes()) {
            foreach ($request->permissions as $perm) {
                Permission::create([
                    'name' => "{$perm} {$request->name}"
                ]);
            }

            return redirect()->route('permissions.index')->with('success', 'Permissions Added Successfully.');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', ['permission' => $permission]);
    }
    public function update($id, Request $request)
    {
        $permissions = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name, ' . $id . ',id|min:3',
        ]);

        if ($validator->passes()) {
            // Permission::create(['name' => $request->name]);
            $permissions->name = $request->name;
            $permissions->save();
            return redirect()->route('permissions.index')->with('success', 'Permissions Edited Successfully.');
        } else {
            return redirect()->route('permissions.edit', $id)->withErrors($validator)->withInput();
        }
    }


    public function destroy(Request $request)
    {
        $id = $request->id;

        $permission = Permission::find($id);

        if ($permission == null) {
            session()->flash('error', 'Permission not found');
            return response()->json([
                'status' => false
            ]);
        }

        $permission->delete();

        session()->flash('success', 'Permission Deleted Succesfully.');
        return response()->json([
            'status' => true
        ]);
    }
}
