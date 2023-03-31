<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiciosWeb;

class ServiciosWebController extends Controller {

    public function get($perfil, $opcion = '') {
        $serviciosWeb = Serviciosweb::where('perfil', $perfil)->where('estatus', '1')->get();
        foreach ($serviciosWeb as $key => $value) {
            $serviciosWeb[$key]['url'] = substr($value['url'], 0, -4);
            $serviciosWeb[$key]["color"] = strpos($value['url'], $opcion) === false ? "" : "w3-red";
        }
        return $serviciosWeb;
    }

}
