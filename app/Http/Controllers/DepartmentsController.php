<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_departments()
    {
        return view('system_management/departments');
    }

    //获取所有科室
    public function get_departments()
    {
        $departments = Department::all();
        return $departments;
    }

    //获取所有状态为启用的科室
    public function get_used_departments()
    {
        $used_departments = Department::where('status','T')->get();
        return $used_departments;
    }

    //验证部门(科室)是否重名
    public function validate_name(Request $request)
    {
        $name = $request->get('name');
        $names = Department::all()->pluck('name');
        if ($names->contains($name)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_department(Request $request)
    {
        $department = $request->get('department');
        Department::create([
            'name' => $department['name'],
            'pid' => $department['pid'],
            'manager' => $department['manager'],
            'phone' => $department['phone'],
            'order' => $department['order'],
            'status' => $department['status'],
            'remarks' => $department['remarks'],
        ]);
        $p_name = Department::find($department['pid'])->name;
        return $p_name;
    }
}
