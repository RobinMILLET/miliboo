<?php

namespace App\Http\Controllers;

use App\Models\ServiceMiliboo;
use Illuminate\Http\Request;
use App\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class LoginServicesController extends Controller
{
        public function showLoginForm()
    {
        return view('admin.login');
    }

public function login(Request $request)
{
    $request->validate([
        'loginservice' => 'required',
        'password' => 'required',
    ]);

    $admin = ServiceMiliboo::where('loginservice', $request->loginservice)->first();

    $hashedPassword = hash('sha256', $request->password);

    if ($admin && $hashedPassword === $admin->hashmdpservice) {
        $_SESSION['admin'] = $admin;

        if ($request->has('remember')) {
            $token = Str::random(256);
            $admin->remembertoken = $token;
            $admin->save();
            return redirect('/admin/dashboard')->cookie('admin_remember_token', $token, 60 * 24 * 30);
        }

        return redirect('/admin/dashboard');
    }

    return back()->with('error', 'Invalid credentials');
}

    public function logout(Request $request)
    {
        if (isset($_SESSION['admin'])) {
            $admin = ServiceMiliboo::find($_SESSION['admin']->idservice);
            if ($admin) {
                $admin->remembertoken = null;
                $admin->save();
            }
        }
        unset($_SESSION['admin']);
        return redirect('/admin/login')->cookie('admin_remember_token', '', -1);
    }
}
