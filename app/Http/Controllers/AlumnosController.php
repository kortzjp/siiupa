<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnosController extends Controller {

    public function index() {
        return view('alumnos.index');
    }

    public function check(Request $request) {
        $request->validate([
            'nocuenta' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        $alumno = Alumno::where('nocuenta', $request->nocuenta)->first();
        if ($alumno != null) {
            $persona = $alumno->persona;
            if ($persona->password === sha1($request->password)) {
                session(['LoggedAlumno' => $persona->idpersonas]);
                session()->save();
                return redirect('alumnos/index');
            }
        }
        return redirect()->route('alumnos.login')->with('fail', __('auth.failed'));
    }

    public function exit() {
        if (session()->has('LoggedAlumno')) {
            session()->pull('LoggedAlumno');
        }
        return redirect()->to('/');
    }

}
