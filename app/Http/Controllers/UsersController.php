<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Purchase;
use Gate;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Gate::denies('manage-user-role-department'))
        {
            return redirect()->back();
        }
        $users = User::with('role', 'department')->get();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(User $id)
    {
        $roles = Role::all();
        $departments = Department::all();
        User::find($id);
        return view('admin.users.edit', compact('id'),[
            'roles' => $roles, 'departments' => $departments,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $updateUser = $request->all();
        $user->update($request->all());
        return redirect('users')->with('success', 'User Updated!');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('users')->with('msg', 'User Deleted!');
    }
}
