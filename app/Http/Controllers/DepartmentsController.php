<?php

namespace App\Http\Controllers;

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
}
