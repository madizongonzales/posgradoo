<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginForm extends Controller
{
    //
    public function index()
    {
        return view('Login.login');
    }
    public function logout (Request $request)
    {
        Session::forget('data_session');
        return redirect('/login');
    }
}
