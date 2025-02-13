<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view users', only: ['index']),
            new Middleware('permission:edit users', only: ['edit']),
            // new Middleware('permission:create permissions', only: ['create']),
            // new Middleware('permission:delete permissions', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('user.list', [
            'users' => $users,
        ]);
    }

    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $users = User::with('roles')->latest();
    //         return DataTables::of($users)
    //             ->addIndexColumn()
    //             ->addColumn('roles', function ($user) {
    //                 return $user->roles->pluck('name')->implode(', ');
    //             })
    //             ->addColumn('created_at', function ($user) {
    //                 return $user->created_at->format('d M, Y');
    //             })
    //             ->addColumn('action', function ($user) {
    //                 $editBtn = auth()->user()->can('edit users') ?
    //                     '<a href="' . route('users.edit', $user->id) . '" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>' : '';

    //                 $deleteBtn = auth()->user()->can('delete users') ?
    //                     '<a href="javascript:void(0)" onclick="deleteUser(' . $user->id . ')" class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>' : '';

    //                 return $editBtn . ' ' . $deleteBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('user.list');
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('user.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.list')->with('success', 'User Added Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();

        $hasRoles = $user->roles->pluck('id');
        return view('user.edit', [
            'user' => $user,
            'roles' => $roles,
            'hasRoles' => $hasRoles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $user = User::findOrFail($id);

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:3',
    //         'email' => 'required|email|unique:users,email, ' . $id . ',id'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('users.edit', $id)->withInput()->withErrors($validator);
    //     }

    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->save();

    //     $user->syncRoles($request->role);

    //     return redirect()->route('users.list')->with('success', 'user updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed', // Tidak wajib, tetapi jika diisi minimal 6 karakter
            'roles' => 'array', // Pastikan data roles dikirim dalam array
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Update roles (hapus semua peran lama, lalu tambahkan yang baru)
        $user->roles()->sync($request->roles ?? []); // Jika kosong, akan menghapus semua role

        return redirect()->route('users.list')->with('success', 'User Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if ($user === null) {
            session()->flash('error', 'User not found');
            return response()->json([
                'status' => false
            ]);
        }


        $user->delete();
        session()->flash('success', 'User deleted Successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
