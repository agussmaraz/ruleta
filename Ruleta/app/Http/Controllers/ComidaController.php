<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comida;

class ComidaController extends Controller
{
    function show(){
        $comida = Comida::all();
        return view('/comidas')->with('comida', $comida);
    }
    function enviar(Request $request){
        // dd($request);
        $nuevo = new \App\Comida();
        $nuevo->comida = $request['comida'];
        $nuevo->user_id = Auth::user()->id;
        $nuevo->save();
        return redirect('/comidas');
    }

    function eliminar($id){
        $eliminar = Comida::find($id);
        $eliminar->delete();
        return response()->json($eliminar);
    }
    function editar($id){
        $comida = Comida::find($id);
        return view('/editar')->with('comida', $comida);
    }
    function update(Request $request, $id){
        $comida = Comida::find($id);
        $comida->comida = $request->input('comida');
        $comida->save();
        return view('/editar')->with('comida', $comida);
    }
}
