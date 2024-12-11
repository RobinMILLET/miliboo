<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('compte');
    }

    public function tryLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
        ]);
        $client = Client::auth($request->email, $request->password);
        if ($client === null) {
            return redirect()->back()->withErrors(['error' => 'email'])->withInput();
        }
        if ($client === false) {
            return redirect()->back()->withErrors(['error' => 'mdp'])->withInput();
        }
        $_SESSION["client"] = $client;
        return redirect('/')->with('success', 'ok');
    }
}
