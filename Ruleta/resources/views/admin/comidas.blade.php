@extends('layouts.plantilla')
@section('contenido')
<h1> Panel de comidas  </h1>
<div>
    <form class="form-inline" method="get">
        {{-- @csrf --}}
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
        <button class="btn bg-secondary my-3 my-sm-0 text-white buscar" type="submit">Buscar</button>
    </form>
</div>
<section class="caja">
    <table class="table crud">
        <thead>
            <tr>
                <th scope="col"> Id </th>
                <th scope="col"> Fecha</th>
                <th scope="col"> Comida </th>
                <th scope="col"> Creador </th>
                <th scope="col"> Estado </th>
                <th scope="col"> Editar </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comida as $item)
            <tr class="linea">
                <th scope="row">{{$item->id}} </th>
                <td>{{$item->updated_at}} </td>
                <td>{{$item->comida}}</td>
                <td>{{$item->User['name']}} </td>
                
                <td class="dato">
                    @if($item->estado == 1)
                    <div class="aprobado">Aprobado</div> 
                    @elseif($item->estado == 0)
                    <div class="nuevo">Nuevo!</div>
                    @else
                    <div class="rechazado">Rechazado</div>
                    @endif
                    
                </td>
                
                <td>
                    @if($item->estado == 0)
                    <button id="{{$item->id}}" class="aprobarComida"><i class="fas fa-check"></i></button>
                    <button id="{{$item->id}}" class="rechazar"><i class="fas fa-times eliminarComida"></i></button>                
                    @else
                    <button id="{{$item->id}}" class="eliminar"><i class="fas fa-trash-alt"></i></button>                
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $comida->links() }} 
</section>
@endsection
