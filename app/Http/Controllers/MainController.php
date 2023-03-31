<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function dashboard() {
        $user = User::where('idpersonas', session('LoggedUser'))->first();
        return view('dashboard',['user' => $user]);
    }
}
