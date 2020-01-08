@extends('layouts.plantilla')
@section('contenido')
<h1>
    Hola {{$usuario->name}}
</h1>
<br>
<table class="table crud">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Comida</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuario->comida as $comida) 
        <tr>
            <td>{{$comida->updated_at}} </td>
            <td> {{$comida->comida}} </td>
            <td> ! </td>
            <td> 
                <button id="{{$comida->id}}" class="eliminar"><i class="fas fa-trash"></i> </button> 
              
                <a href="/editar/{{$comida->id}}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection