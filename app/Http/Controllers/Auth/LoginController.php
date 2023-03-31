<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        $user = User::where('idpersonas', $request->email)->first();
        if ($user->password === sha1($request->password)) {
            // $request->session()->put('LoggedUser', $user->id);
            session(['LoggedUser' => $user->id]);     
            session()->save();
            return redirect('dashboard');
        }
        return redirect()->route('login')->with('login_failed', __('auth.failed'));
    }

    public function logout() {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect()->to('/');
        }
    }

}
