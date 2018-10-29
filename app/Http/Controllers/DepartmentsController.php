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
    public function get_used_departments(Request $request)
    {
        $name = $request->get('name');
        $used_departments = Department::where([['status','T'],['name','<>',$name]])->get();
        return $used_departments;
    }

    //验证部门(科室)是否重名
    public function validate_name(Request $request)
    {
        $name = $request->get('name');
        $isEdit = $request->get('isEdit');
        $collect= Department::all()->pluck('name');
        $collect2 = $collect->diff([$isEdit]);
        if($isEdit) {//判断是否打开的是编辑窗口，如果是编辑窗口，将不检测当前编辑的部门名称
            $names = $collect2;
        }else {
            $names = $collect;
        }

        if ($names->contains($name)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_department(Request $request)
    {
        $department = $request->get('department');
        $new_department = Department::create([
            'name' => $department['name'],
            'pid' => $department['pid'],
            'manager' => $department['manager'],
            'phone' => $department['phone'],
            'order' => $department['order'],
            'status' => $department['status'],
            'remarks' => $department['remarks'],
        ]);
//        if ($department['pid']) {
//            //根据传递过来的pid值，找到对应的上级科室名称并传给客户端
//            $p_name = Department::find($department['pid'])->name;
//        } else {
//            $p_name = '';
//        }
        $p_name = $this->get_p_name($department['pid']);

        return [$department['pid'],$p_name,$new_department->created_at];
    }

    public function edit_department(Request $request)
    {
        $isEditName = $request->get('isEdit');
        $newDepartment = $request->get('department');

        $department = Department::where('name',$isEditName)->first();
            $department->name = $newDepartment['name'];
            $department->pid = $newDepartment['pid'];
            $department->manager = $newDepartment['manager'];
            $department->phone = $newDepartment['phone'];
            $department->order = $newDepartment['order'];
            $department->status = $newDepartment['status'];
            $department->remarks = $newDepartment['remarks'];
        $department->save();

        $p_name = $this->get_p_name($newDepartment['pid']);

        return $p_name;

    }

    public function get_p_name($pid)
    {
        if ($pid) {
            //根据传递过来的pid值，找到对应的上级科室名称并传给客户端
            $p_name = Department::find($pid)->name;
        } else {
            $p_name = '';
        }
        return $p_name;
    }
}
