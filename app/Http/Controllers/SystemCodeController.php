<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Post;
use App\Education;
use App\Title;
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

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //获取'性别'表的数据
    public function get_gender()
    {
        $gender = Gender::all();
        return $gender;
    }

    //获取正在使用的'性别'表的数据
    public function get_used_gender()
    {
        $gender_used = Gender::where('status','T')->get();
        $default_selectId = Gender::where('isFirst','T')->value('id');
        return [$gender_used,$default_selectId];
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

        $isFirst_exist_T =  Gender::where('isFirst','T')->exists();

        if($gender['isFirst']==='T') {
            Gender::where('isFirst','T')->update(['isFirst'=>'F']);
        }

        if($isFirst_exist_T) {
            $isFirst = $gender['isFirst'];
        }else {
            $isFirst = 'T';
        }
        $new_gender = Gender::create([
            'description' => $gender['description'],
            'isFirst' => $isFirst,
            'order' => $gender['order'],
            'status' => $gender['status'],
            'remarks' => $gender['remarks'],
        ]);
        return [$new_gender->created_at];
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //获取'职称'表的数据
    public function get_title()
    {
        $title = Title::all();
        return $title;
    }

    //获取正在使用的'职称'表的数据
    public function get_used_title()
    {
        $title_used = Title::where('status','T')->get();
        $default_selectId = Title::where('isFirst','T')->value('id');
        return [$title_used,$default_selectId];
    }

    //验证职称描述description是否重名
    public function validate_title(Request $request)
    {
        $description = $request->get('description');
        $isEdit = $request->get('isEdit');
        $collect= Title::all()->pluck('description');
        $collect2 = $collect->diff([$isEdit]);
        if($isEdit) {//判断是否打开的是编辑窗口，如果是编辑窗口，将不检测当前编辑的职称描述
            $descriptions = $collect2;
        }else {
            $descriptions = $collect;
        }

        if ($descriptions->contains($description)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_title(Request $request)
    {
        $title = $request->get('title');

        $isFirst_exist_T =  Title::where('isFirst','T')->exists();

        if($title['isFirst']==='T') {
            Title::where('isFirst','T')->update(['isFirst'=>'F']);
        }

        if($isFirst_exist_T) {
            $isFirst = $title['isFirst'];
        }else {
            $isFirst = 'T';
        }
        $new_title = Title::create([
            'description' => $title['description'],
            'isFirst' => $isFirst,
            'order' => $title['order'],
            'status' => $title['status'],
            'remarks' => $title['remarks'],
        ]);
        return [$new_title->created_at];
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //获取'职务'表的数据
    public function get_post()
    {
        $post = Post::all();
        return $post;
    }

    //获取正在使用的'职务'表的数据
    public function get_used_post()
    {
        $post_used = Post::where('status','T')->get();
        $default_selectId = Post::where('isFirst','T')->value('id');
        return [$post_used,$default_selectId];
    }

    //验证职务描述description是否重名
    public function validate_post(Request $request)
    {
        $description = $request->get('description');
        $isEdit = $request->get('isEdit');
        $collect= Post::all()->pluck('description');
        $collect2 = $collect->diff([$isEdit]);
        if($isEdit) {//判断是否打开的是编辑窗口，如果是编辑窗口，将不检测当前编辑的职务描述
            $descriptions = $collect2;
        }else {
            $descriptions = $collect;
        }

        if ($descriptions->contains($description)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_post(Request $request)
    {
        $post = $request->get('post');

        $isFirst_exist_T =  Post::where('isFirst','T')->exists();

        if($post['isFirst']==='T') {
            Post::where('isFirst','T')->update(['isFirst'=>'F']);
        }

        if($isFirst_exist_T) {
            $isFirst = $post['isFirst'];
        }else {
            $isFirst = 'T';
        }
        $new_post = Post::create([
            'description' => $post['description'],
            'isFirst' => $isFirst,
            'order' => $post['order'],
            'status' => $post['status'],
            'remarks' => $post['remarks'],
        ]);
        return [$new_post->created_at];
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    //获取'学历'表的数据
    public function get_education()
    {
        $education = Education::all();
        return $education;
    }

    //获取正在使用的'学历'表的数据
    public function get_used_education()
    {
        $education_used = Education::where('status','T')->get();
        $default_selectId = Education::where('isFirst','T')->value('id');
        return [$education_used,$default_selectId];
    }

    //验证学历描述description是否重名
    public function validate_education(Request $request)
    {
        $description = $request->get('description');
        $isEdit = $request->get('isEdit');
        $collect= Education::all()->pluck('description');
        $collect2 = $collect->diff([$isEdit]);
        if($isEdit) {//判断是否打开的是编辑窗口，如果是编辑窗口，将不检测当前编辑的学历描述
            $descriptions = $collect2;
        }else {
            $descriptions = $collect;
        }

        if ($descriptions->contains($description)) {
            return response()->json(['data'=>true]);
        }
        return response()->json(['data'=>false]);
    }

    public function add_education(Request $request)
    {
        $education = $request->get('post');

        $isFirst_exist_T =  Education::where('isFirst','T')->exists();

        if($education['isFirst']==='T') {
            Education::where('isFirst','T')->update(['isFirst'=>'F']);
        }

        if($isFirst_exist_T) {
            $isFirst = $education['isFirst'];
        }else {
            $isFirst = 'T';
        }
        $new_education = Education::create([
            'description' => $education['description'],
            'isFirst' => $isFirst,
            'order' => $education['order'],
            'status' => $education['status'],
            'remarks' => $education['remarks'],
        ]);
        return [$new_education->created_at];
    }
}
