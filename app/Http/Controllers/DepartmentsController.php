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

    public function add_department(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:2'
        ]);
        $department = Department::create([
            'name' => $request->get('name'),
        ]);
        return $department;
    }
}
