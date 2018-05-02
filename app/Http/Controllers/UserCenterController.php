<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCenterController extends Controller
{
    public function index()
    {
        return view('user.center');
    }
}
