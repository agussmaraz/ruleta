<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Laravel</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <script src="js/Winwheel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.4/gsap.min.js"></script>
    
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
        
    </div>
    <section>
        <input type="submit" onClick="ruleta.startAnimation();" value="girar">
        <canvas id="canvas" width="400" height="400"> </canvas>
    </section>
    <script>
        let ruleta = new Winwheel({
            'numSegments': 6,
            'outerRadius': 170,
            'segments': [
            {'fillStyle': '#94C6E3', 'text': 'hola' },
            {'fillStyle': '#9AC5E8', 'text': 'amor' },
            {'fillStyle': '#9AAEE8', 'text': 'mira' },
            {'fillStyle': '#CD9AE8', 'text': 'lo' },
            {'fillStyle': '#E89AC7 ', 'text': 'que' },
            {'fillStyle': '#E89A9A  ', 'text': 'hice' }, 
            ],
            'animation': {
                'type': 'spinToStop',
                'duration': 5,
                'spins': 8,
                'callbackFinished': 'mensaje()',
                'callbackAfter': 'dibujarIndicador()'
            }
        });
        function mensaje(){
            var elementoSeleccionado = ruleta.getIndicatedSegment();
            console.log(elementoSeleccionado);
            alert('Te tocó ' + elementoSeleccionado.text);
            ruleta.stopAnimation(false);
            ruleta.rotationAngle = 0;
            ruleta.draw();
            dibujarIndicador();
        };

        dibujarIndicador();
            function dibujarIndicador() {
                var ctx = ruleta.ctx;
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
        
    </body>
    </html>
    {{-- <script src="js/ruleta.js"></script> --}}
    