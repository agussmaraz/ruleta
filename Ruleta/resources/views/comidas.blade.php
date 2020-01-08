@extends('layouts.plantilla')
@section('contenido')
{{-- <a href="{{ url('/') }}"><i class="fas fa-arrow-circle-left icon"></i></a> --}}
<h1> Armá tu propia ruleta de comidas</h1>
<br>
<section class="caja-armar">
  <div>
    <h3> Selecciona las comidas que prefieras</h3>
    <br>
    <ul class="lista">
      @foreach ($comida as $item)
      <li class="li-comida" id="{{$item->id}}"> {{$item->comida}}</li>
      <hr>
      @endforeach
    </ul>
  </div>
  
  <div class="caja">
    <input type="submit" onClick="ruleta2.startAnimation();" class="boton-girar" value="Girar">
    <br>
    <canvas id="canvas2" width="400" height="400"> </canvas>
  </div>
</section>


<h1> Agregar nuevos platos </h1>
<form method="POST" class="form-comidas">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1"> Plato de comida </label>
    <input type="text" name="comida" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
  let ruleta2 = new Winwheel({
    'canvasId': 'canvas2',
    'numSegments': 0,
    'fillStyle': '#e7706f',
    'lineWidth': 3,
    'animation': {
      'type': 'spinToStop',
      'duration': 3,
      'spins': 2,
      'callbackFinished': 'mensaje2()',
      'callbackAfter': 'dibujarIndicador2()'
    }
  });
  
  let id = document.querySelectorAll('.li-comida');
  id.forEach(element => element.addEventListener('click', function () {
    var palabra = element.innerHTML;
    addSegment(palabra);
  }));
  
  function addSegment(palabra) {
    ruleta2.addSegment({
      'text': palabra,
      'fillStyle': '#DDEAEC'
    }, 1);
    ruleta2.draw();
  }
  
  function mensaje2() {
    var elementoSeleccionado = ruleta2.getIndicatedSegment();
    Swal.fire('Te tocó ' + elementoSeleccionado.text);
    ruleta2.stopAnimation(false);
    ruleta2.rotationAngle = 0;
    ruleta2.draw();
    dibujarIndicador2();
  };
  
  dibujarIndicador2();
  function dibujarIndicador2() {
    var ctx = ruleta2.ctx;
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