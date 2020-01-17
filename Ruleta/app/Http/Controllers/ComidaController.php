<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comida;
use App\User;
use App\Categoria;

class ComidaController extends Controller
{
    //Mostrar las comidas que hay para armar una ruleta
    function show()
    {
        $comida = Comida::where('estado', 1)->get();
        return view('/crea')->with('comida', $comida);
    }
    // Agregar nuevas comidas
    function enviar(Request $request)
    {
        // dd($request);
        $reglas = [
            'comida' => "filled|min:2|max:100|unique:comidas,comida",
        ];
        $mensajes = [
            "filled" => "El campo :attribute no puede estar vacio",
            "min" => "El campo :attribute debe tener como mínimo :min caracteres",
            "max" => "El campo :attribute debe tener como máxmimo :max caracteres",
            "Unique" => "El campo :attribute ya se encuentra registrado"
        ];
        $this->validate($request, $reglas, $mensajes);

        $nuevo = new \App\Comida();
        $nuevo->comida = $request['comida'];
        $nuevo->user_id = Auth::user()->id;
        $nuevo->categoria_id = $request['categoria'];
        $nuevo->save();

        return redirect('/crea');
    }
    function eliminar($id)
    {
        $eliminar = Comida::find($id);
        $eliminar->delete();
        return response()->json($eliminar);
    }
    // Editar las comidas
    function editar($id)
    {
        $comida = Comida::find($id);
        return view('/editar')->with('comida', $comida);
    }
    // Guardar los datos de las comidas
    function update(Request $request, $id)
    {
        $reglas = [
            'comida' => "filled|min:2|max:100|unique:comidas,comida",
        ];
        $mensajes = [
            "filled" => "El campo :attribute no puede estar vacio",
            "min" => "El campo :attribute debe tener como mínimo :min caracteres",
            "max" => "El campo :attribute debe tener como máxmimo :max caracteres",
            "Unique" => "El campo :attribute ya se encuentra registrado"
        ];
        $this->validate($request, $reglas, $mensajes);

        $comida = Comida::find($id);
        $comida->comida = $request->input('comida');
        $comida->save();
        return view('/editar')->with('comida', $comida);
    }


    function userBuscar(Request $request){
        $buscar = $request->busqueda;
        $comidas = Comida::where('comida', 'like', '%' . $buscar . '%')->paginate(6);
        return view('/cuenta')->with('comidas', $comidas);
    }
    // Mostrar las comidas al crud de los admin
    // function mostrar()
    // {
    //     $comida = Comida::orderBy('estado', 'asc')->paginate(6);
    //     return view('/admin/comidas')->with('comida', $comida);
    // }
    // Aprobar las comidas de los usuarios en el crud del admin
    function aprobar($id)
    {
        $comida = Comida::find($id);
        $comida1 = $comida->estado;
        if ($comida1 == 0) {
            $comida1 = 1;
        }
        $comida->estado = $comida1;
        $comida->save();
        return response()->json($comida);
    }
    // Denegar las comidas de los admin
    function denegar($id)
    {
        $comida = Comida::find($id);
        $comidaR = $comida->estado;
        if ($comidaR == 0) {
            $comidaR = 3;
        }
        $comida->estado = $comidaR;
        $comida->save();
        return response()->json($comida);
    }
    // Buscar las comidas en el crud del admin
    function buscar(Request $request){
        $buscar = $request->busqueda;
        // dd($buscar);
        $comidas = Comida::where('comida', 'like', '%' . $buscar . '%')->paginate(5);
        return view('/admin/comidas')->with('comida', $comidas);
    }
}
