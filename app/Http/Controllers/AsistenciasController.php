<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Periodo;

class AsistenciasController extends Controller {

    public function capturarAsistencias(Request $request) {
        $profesor = Profesor::where('idpersonas', session('LoggedProfesor'))->first()->persona;
        $periodo = Periodo::where('actual', '1')->first();
        $listaAlumnos = $this->listaAlumnos($request->grupo, $periodo->idperiodo);
        $serviciosWeb = ServiciosWebController::get('ACADÉMICO', 'captura_cal_tmp');
        return view('asistencias.capturarAsistencias', ['profesor' => $profesor,
            'serviciosWeb' => $serviciosWeb,
            'listaAlumnos' => $listaAlumnos
            ]);
    }

    private function listaAlumnos($grupo, $periodo) {
        $lista = DB::table('resultado')
                ->join('materiaplan', 'resultado.idmateria', '=', 'materiaplan.idmateria')
                ->join('alumno', 'alumno.nocuenta', '=', 'resultado.nocuenta')
                ->join('persona', 'alumno.idpersonas', '=', 'persona.idpersonas')
                ->join('grupo', 'grupo.idgrupo', '=', 'resultado.idgrupo')
                ->where('grupo.idgrupo', '=', $grupo)
                ->where('grupo.idperiodo', '=', $periodo)
                ->where('resultado.tipo_res', '!=', 'B')
                ->where('alumno.estatus', 'NOT LIKE', 'BAJA%')
                ->selectRaw('resultado.*, nombreCompleto(persona.idpersonas) AS nombre_alumno')
                ->orderBy('nombre_alumno')
                ->get();

        return ($lista);
    }

}
