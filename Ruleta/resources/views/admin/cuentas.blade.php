@extends('layouts.plantilla')
@section('contenido')
<h1> Panel de usuarios </h1>
<div>
    <form class="form-inline" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
        <button class="btn bg-secondary my-3 my-sm-0 text-white buscar" type="submit">Buscar</button>
    </form>
</div>
<table class="table crud">
    <thead>
        <tr>
            <th scope="col"> Id </th>
            <th scope="col">Fecha</th>
            <th scope="col"> Nombre </th>
            <th scope="col">Email</th>
            <th scope="col">Perfil</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuario as $user)
        <tr>
            <th scope="row">{{$user->id}} </th>
            <td>{{$user->updated_at}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}} </td>
            <td>{{$user->perfil}}</td>
            <td>
                <button id="{{$user->id}}" class="eliminarUser"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection