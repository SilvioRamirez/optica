<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estado;
use App\Models\Laboratorio;
use App\Models\Municipio;
use App\Models\Parroquia;

class DropdownController extends Controller
{
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function index()

    {
        $data['estados'] = Estado::get(["estado", "id_estado"]);
        return view('dropdown', $data);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function fetchMunicipio(Request $request)
    {
        $data['municipios'] = Municipio::where("id_estado", $request->id_estado)
                                                    ->get(["municipio", "id_municipio"]);
        return response()->json($data);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function fetchParroquia(Request $request)
    {
        $data['parroquias'] = Parroquia::where("id_municipio", $request->id_municipio)
                                                    ->get(["parroquia", "id_parroquia"]);
        return response()->json($data);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function fetchLaboratorio(Request $request)
    {
        //Se utiliza params por los parametros de la peticion axios
        $data['laboratorios'] = Laboratorio::where("tipo", $request->params['tipo'])
                                                    ->get(["razon_social", "id"]);
        return response()->json($data);
    }

}
