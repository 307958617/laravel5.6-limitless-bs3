<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class SystemCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_system_code()
    {
        return view('basic_data/system_code');
    }

    //获取'性别'表的数据
    public function get_gender()
    {
        $gender = Gender::all();
        return $gender;
    }

    //验证性别描述description是否重名
    public function validate_gender(Request $request)
    {
        $description = $request->get('description');
        $isEdit = $request->get('isEdit');
        $collect= Gender::all()->pluck('description');
        $collect2 = $collect->diff([$isEdit]);
        if($isEdit) {//判断是否打开的是编辑窗口，如果是编辑窗口，将不检测当前编辑的性别描述
            $descriptions = $collect2;
        }else {
            $descriptions = $collect;
        }

        if ($descriptions->contains($description)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_gender(Request $request)
    {
        $gender = $request->get('gender');

        if($gender['isFirst']==='T') {
            Gender::where('isFirst','T')->update(['isFirst'=>'F']);
        }

        $new_gender = Gender::create([
            'description' => $gender['description'],
            'isFirst' => $gender['isFirst'],
            'order' => $gender['order'],
            'status' => $gender['status'],
            'remarks' => $gender['remarks'],
        ]);

        return [$new_gender->created_at];
    }
}
