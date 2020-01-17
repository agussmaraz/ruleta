@extends('layouts.plantilla')
@section('contenido')
<h1>
    Hola {{Auth::user()['name']}}
</h1>
<br>
<div>
    <form class="form-inline" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
        <button class="btn bg-secondary my-3 my-sm-0 text-white buscar" type="submit">Buscar</button>
    </form>
</div>
<section class="caja">
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
            @foreach ($comidas as $comida)  
            {{-- @dd($comidas) --}}
            <tr class="linea">
                <th scope="row">{{$comida->updated_at}} </th>
                <td> {{$comida->comida}} </td>
                <td>
                    @if($comida->estado == 1)
                    <div class="aprobado">Aprobado</div>
                    @elseif($comida->estado == 0)
                    <div class="espera">En espera</div>
                    @else
                    <div class="rechazado">Rechazado <a type="button" class="btn btn-lg bg-transparent border-0" data-toggle="popover" data-content="El plato fue rechazado porque no cumple con las normas"><i class="fas fa-question-circle"></i></a></div>
                    
                </div>
                @endif
            </td>
            <td> 
                @if($comida->estado == 1)
                <button id="{{$comida->id}}" class="eliminar"><i class="fas fa-trash"></i> </button>   
                <a href="/editar/{{$comida->id}}" class="editar"><i class="fas fa-edit"></i></a>
                @else
                <button id="{{$comida->id}}" class="eliminar"><i class="fas fa-trash"></i> </button>   
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $comidas->links() }} 
</section>

@endsection

