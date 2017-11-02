<?php

namespace App\Http\Controllers\Admin\Access;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function loadLoginPage()
    {
        return view('admin.access.login');
    }


    public function loadRegisterPage()
    {
        return view('admin.access.register');
    }


    public function loadDashboard()
    {
        return view('admin.profile');
    }
}
