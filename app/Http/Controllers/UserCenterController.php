<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCenterController extends Controller
{
    public function index()
    {
        return view('user.center');
    }

    public function bindPhone()
    {
        return view('user.bind_phone');
    }
}
