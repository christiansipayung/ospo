<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Gate;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function forms()
    {
        if(Gate::denies('manage-user-role-department'))
        {
            return redirect()->back();
        }
        return view('admin.department.departmentForm');
    }

    public function store()
    {
        $department = new Department();
        $department->name = Request('departmentName');
        $department->save();

        return redirect('/department')->with('success', 'Department Created!');
    }

    public function index()
    {
        if(Gate::denies('manage-user-role-department'))
        {
            return redirect()->back();
        }
        $departments = Department::all();
        return view('admin.department.index', [
            'departments' => $departments,
        ]);
    }

    public function edit(Department $id)
    {
        return view('admin.department.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department['name'] = $request->get('departmentName');
        $department->save();
        return redirect('/department')->with('success', 'Department Updated!');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department')->with('msg', 'Department Deleted!');
    }
}
