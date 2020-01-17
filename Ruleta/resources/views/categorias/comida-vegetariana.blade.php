@extends('layouts.plantilla')
@section('contenido')
<section class="caja">
    
    <h1 class="h1"> Ruleta Vegetariana </h1>
    <div class="caja">
        <input type="submit" onClick="ruletaVeggie.startAnimation();" class="boton-girar" value="Girar">
        <br>
        <canvas id="canvasVeggie" width="400" height="400"> </canvas>
    </div>
    
</section>

@endsection
