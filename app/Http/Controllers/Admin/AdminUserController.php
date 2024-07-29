<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminUserController extends Controller
{
    public function index()
    {
        $pageTitle = "User List | Petlodger";
        $users = User::with('role')->whereIn('role_id', [1, 2, 3])->orderByDesc('created_at')->paginate(5);

        return view('admin.user.index', compact('users', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = "Create New Service | Petlodger";
        $roles = Role::where('name','Super Admin')->orWhere('name','Sub Admin')->get();

        return view('admin.user.add', compact('roles', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'full_name' => 'required|string|max:160',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric|digits:11',
            'role_id' => 'required',
            'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'active' => 1,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin.user.lists')->with('success', 'User created successfully');
    }

    public function show(string $id)
    {
        $pageTitle = "User Details | Petlodger";
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.view', compact('user', 'roles', 'pageTitle'));
    }

    public function edit($id)
    {
        $pageTitle = "User Edit | Petlodger";
        $user = User::findOrFail($id);
        $roles = Role::where('name','Super Admin')->orWhere('name','Sub Admin')->get();
        // dd($roles);

        return view('admin.user.edit', compact('user', 'roles', 'pageTitle'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:160',
            'mobile' => 'required|numeric|digits:11',
            'role_id' => 'required',
            'user_id' => 'required',
            // 'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = time() . '.' . $name;
            $file->move(public_path('admin_image/'), $filename);
            // Update image in the database
            // $user->update(['image' => $filename]);
            $user->image = $filename;
        }
        // dd($filename);
        $user->full_name = $request->full_name;
        $user->mobile = $request->mobile;
        $user->password = bcrypt($request->password);
        $user->active = 1;
        $user->role_id = $request->role_id;
        $user->save();
        // $user->update([
        //     'full_name' => $request->full_name,
        //     'mobile' => $request->mobile,
        //     'password' => bcrypt($request->password),
        //     'active' => 1,
        //     'role_id' => $request->role_id,
        // ]);

        return redirect()->route('admin.user.lists')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.lists')->with('success', 'User deleted successfully');
    }
}
