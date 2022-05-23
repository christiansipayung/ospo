<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gate;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forms()
    {
        if(Gate::denies('manage-user-role-department'))
        {
            return redirect()->back();
        }
        return view('admin/roles/rolesForm');
    }

    public function index(){
        if(Gate::denies('manage-user-role-department'))
        {
            return redirect()->back();
        }
        $roles = DB::table('roles')->get();
        return view('admin/roles/index', [
            'roles' => $roles
        ]);
    }

    public function store(){
        $role = new Role();
        $role->name = request('roleName');
        $role->description = request('roleDesc');
        $role->save();
        return redirect('roles')->with('msg', 'Role Created!');
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect('roles')->with('msg', 'Role Deleted!');
    }
}
