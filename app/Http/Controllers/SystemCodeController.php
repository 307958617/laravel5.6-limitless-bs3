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
}
