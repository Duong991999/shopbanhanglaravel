<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->hasRole('admin')){
                dd('ok');
            } else{
                Auth::logout();
            }
        }
        dd(234);
    }
}
