@extends('layouts.plantilla')
@section('contenido')

<body>

        <section class="caja">
            <h1> Elige que vas a comer </h1>
            <input type="submit" onClick="ruleta.startAnimation();" class="boton-girar" value="Girar">
            <br>
            <canvas id="canvas" width="400" height="400"> </canvas>
        </section>
        
    </body>
    @endsection
    {{-- @extends('layouts.plantilla') --}}
    
    