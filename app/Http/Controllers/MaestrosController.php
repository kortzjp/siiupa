<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Periodo;

class MaestrosController extends Controller {


    public function listasAsistencia() {
        $profesor = Profesor::where('idpersonas', session('LoggedProfesor'))->first()->persona;
        $periodo = Periodo::where('actual', '1')->first();
        $grupos = $this->gruposOrdinarios($periodo->idperiodo, session('LoggedProfesor'));
        $serviciosWeb = ServiciosWebController::get('ACADÉMICO', 'captura_cal_tmp');
        return view('maestros.listasAsistencia', ['profesor' => $profesor, 'serviciosWeb' => $serviciosWeb, 'grupos' => $grupos]);
    }

    private function gruposOrdinarios($periodo, $idprofesor) {
        $grupos = DB::table('grupo')
                ->join('materia', 'grupo.idmateria', '=', 'materia.idmateria')
                ->join('periodo', 'grupo.idperiodo', '=', 'periodo.idperiodo')
                ->where('grupo.idperiodo', '=', $periodo)
                ->where('grupo.idprofesor', '=', $idprofesor)
                ->where('grupo.tipo', '=', 'O')
                ->where('grupo.estatus', '=', 1)
                ->select('materia.nombre', 'materia.idmateria',
                        'grupo.idgrupo', 'grupo.clave', 'grupo.facta', 'periodo.periodo', 'periodo.idperiodo', 'grupo.idprofesor')
                ->get();

        return $grupos;
    }

    public function index() {
        $profesor = Profesor::where('idpersonas', session('LoggedProfesor'))->first()->persona;
        $serviciosWeb = ServiciosWebController::get('ACADÉMICO', 'index');
        return view('maestros.index', ['profesor' => $profesor, 'serviciosWeb' => $serviciosWeb]);
    }

    public function check(Request $request) {
        $request->validate([
            'idpersonas' => ['required', 'numeric'],
            'password' => ['required', 'string']
        ]);

        $profesor = Profesor::where('idpersonas', $request->idpersonas)->first();
        if ($profesor != null) {
            $persona = $profesor->persona;
            if ($persona->password === sha1($request->password)) {
                session(['LoggedProfesor' => $persona->idpersonas]);
                session()->save();
                return redirect('maestros/index');
            }
        }
        return redirect()->route('maestros.login')->with('fail', __('auth.failed'));
    }

    public function exit() {
        if (session()->has('LoggedProfesor')) {
            session()->pull('LoggedProfesor');
        }
        return redirect()->to('/');
    }

}
