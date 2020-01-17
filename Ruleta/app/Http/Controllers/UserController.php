<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use SebastianBergmann\Environment\Console;
use App\User;

class UserController extends Controller
{
    function show()
    {
        $usuario = Auth::user();
        return view('/cuenta')->with('usuario', $usuario);
    }
}
