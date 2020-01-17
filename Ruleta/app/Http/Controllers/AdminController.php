<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    function show()
    {
        $usuario = User::all();
        return view('/admin/cuentas')->with('usuario', $usuario);
    }
    function eliminar($id)
    {
        $eliminar = User::find($id);
        $eliminar->delete();
        return response()->json($eliminar);
    }
    function buscar(Request $request)
    {
        // dd($request);
        $buscar = $request->busqueda;
        // dd($buscar);
        $user = User::where('name', 'like', '%' . $buscar . '%')->paginate(10);
        return view('/admin/cuentas')->with('usuario', $user);
    }
    function agregar(Request $request)
    {
        $reglas = [
            'nombreAdmin' => "filled|min:2|max:100",
            'emailAdmin' => "filled|min:5|unique:users,email",
            'passAdmin' => "filled|min:2|max:20",
        ];
        $mensajes = [
            "filled" => "El campo :attribute no puede estar vacio",
            "min" => "El campo :attribute debe tener como mínimo :min caracteres",
            "max" => "El campo :attribute debe tener como máxmimo :max caracteres",
            "Unique" => "El campo :attribute ya se encuentra registrado"
        ];
        $this->validate($request, $reglas, $mensajes);

        $admin = new User();
        $admin->name = $request['nombreAdmin'];
        $admin->email = $request['emailAdmin'];
        $admin->perfil = 1;
        $admin->password = Hash::make($request['passAdmin']);
        $admin->save();
        return back()->with('success','El administrador se creo de forma correcta');
    }
}
