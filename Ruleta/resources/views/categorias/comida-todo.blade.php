@extends('layouts.plantilla')
@section('contenido')
<h1> De todo un poco </h1>

<div class="caja">
    <input type="submit" onClick="ruletaTodo.startAnimation();" class="boton-girar" value="Girar">
    <br>
    <canvas id="canvasTodo" width="400" height="400"> </canvas>
</div>

<script>
    let ruletaTodo = new Winwheel({
        'canvasId': 'canvasTodo',
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
            'callbackFinished': 'mensajeTodo()',
            'callbackAfter': 'dibujarIndicadorTodo()'
        }
        
    });
    function mensajeTodo() {
        var elementoSeleccionadoTodo = ruletaTodo.getIndicatedSegment();
        Swal.fire('Te tocó ' + elementoSeleccionadoTodo.text);
        ruletaTodo.stopAnimation(false);
        ruletaTodo.rotationAngle = 0;
        ruletaTodo.draw();
        dibujarIndicadorTodo();
    };
    
    dibujarIndicadorTodo();
    function dibujarIndicadorTodo() {
        var ctx = ruletaTodo.ctx;
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