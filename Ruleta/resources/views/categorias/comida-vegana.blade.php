@extends('layouts.plantilla')
@section('contenido')
<h1> Ruleta Vegana </h1>

<div class="caja">
    <input type="submit" onClick="ruletaVegana.startAnimation();" class="boton-girar" value="Girar">
    <br>
    <canvas id="canvasVegana" width="400" height="400"> </canvas>
</div>

<script>
    let ruletaVegana = new Winwheel({
        'canvasId': 'canvasVegana',
        'numSegments': 10,
        'fillStyle': 'white',
        'lineWidth': 2,
        'segments': [
        {'fillStyle': 'white', 'text': '1'},
        {'fillStyle': 'white', 'text': '2'},
        {'fillStyle': 'white', 'text': '3'},
        {'fillStyle': 'white', 'text': '4'},
        {'fillStyle': 'white', 'text': '5'},
        {'fillStyle': 'white', 'text': '6'},
        {'fillStyle': 'white', 'text': '7'},
        {'fillStyle': 'white', 'text': '8'},
        {'fillStyle': 'white', 'text': '9'},
        {'fillStyle': 'white', 'text': '10'},
        ],
        'animation': {
            'type': 'spinToStop',
            'duration': 3,
            'spins': 3,
            'callbackFinished': 'mensajeVegana()',
            'callbackAfter': 'dibujarIndicadorVegana()'
        }
        
    });
    function mensajeVegana() {
        var elementoSeleccionadoVegana = ruletaVegana.getIndicatedSegment();
        Swal.fire('Te tocó ' + elementoSeleccionadoVegana.text);
        ruletaVegana.stopAnimation(false);
        ruletaVegana.rotationAngle = 0;
        ruletaVegana.draw();
        dibujarIndicadorVegana();
    };
    
    dibujarIndicadorVegana();
    function dibujarIndicadorVegana() {
        var ctx = ruletaVegana.ctx;
        ctx.strokeStyle = 'navy';
        ctx.fillStyle = 'black';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(170, 0);
        ctx.lineTo(230, 0);
        ctx.lineTo(200, 40);
        ctx.lineTo(171, 0);
        ctx.stroke();
        ctx.fill();
    };
</script>
@endsection