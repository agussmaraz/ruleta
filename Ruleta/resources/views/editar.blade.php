@extends('layouts.plantilla')
@section('contenido')
<article class="caja">
    <h1> El plato que deseas modificar es '{{$comida->comida}}' </h1>
    
    <form method="POST" class="form-comidas">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Plato de comida </label>
            <input type="text" name="comida" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>
@endsection