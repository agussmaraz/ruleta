@extends('layouts.plantilla')
@section('contenido')
<h1> Ruleta Celiaca </h1>
<div class="caja">
    <input type="submit" onClick="ruletaCeliaca.startAnimation();" class="boton-girar" value="Girar">
    <br>
    <canvas id="canvasCeliaca" width="400" height="400"> </canvas>
</div>
<script>
    let ruletaCeliaca = new Winwheel({
        'canvasId': 'canvasCeliaca',
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
            'callbackFinished': 'mensajeCeliaca()',
            'callbackAfter': 'dibujarIndicadorCeliaca()'
        }
        
    });
    function mensajeCeliaca() {
        var elementoSeleccionadoCeliaca = ruletaCeliaca.getIndicatedSegment();
        Swal.fire('Te tocó ' + elementoSeleccionadoCeliaca.text);
        ruletaCeliaca.stopAnimation(false);
        ruletaCeliaca.rotationAngle = 0;
        ruletaCeliaca.draw();
        dibujarIndicadorCeliaca();
    };
    
    dibujarIndicadorCeliaca();
    function dibujarIndicadorCeliaca() {
        var ctx = ruletaCeliaca.ctx;
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