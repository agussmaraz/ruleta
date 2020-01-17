@extends('layouts.plantilla')
@section('contenido')
<div class="caja-principal">
    
    <body>
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/categorias/comida-vegetariana">
                    <i class="fas fa-pizza-slice icono"></i>
                    <p class="cat-sidebar"> Vegetariano </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categorias/comida-vegana">
                    <i class="fas fa-carrot icono"></i>
                    <p class="cat-sidebar"> Vegano </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categorias/comida-celiaca">
                    <img src="/images/icon-free3.png" alt="" width="25px" class="icono">
                    <p class="cat-sidebar"> Celiaco </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="/categorias/comida-todo">
                    <i class="fas fa-drumstick-bite icono"></i>
                    <p class="cat-sidebar"> Todo </p></a>
                </li> --}}
            </ul>
            
            <section class="caja">
                <h1> Elige que vas a comer </h1>
                <input type="submit" onClick="ruleta.startAnimation();" class="boton-girar" value="Girar">
                <br>
                <canvas id="canvas" width="400" height="400"> </canvas>
            </section>
        </div>
        
    </body>
    @endsection
    
    