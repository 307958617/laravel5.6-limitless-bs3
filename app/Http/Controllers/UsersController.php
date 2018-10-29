<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_users()
    {
        return view('system_management/users');
    }

    public function get_users()
    {
        $users = User::with('departments')->where('is_active','T')->get();
        return $users;
    }
}
