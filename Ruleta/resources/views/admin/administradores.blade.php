@extends('layouts.plantilla')
@section('contenido')
<h1> Agregar Administrador </h1>
<section class="cajaForm">
  
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Nombre </label>
            <input type="text" class="form-control" id="nombreAdmin" name="nombreAdmin">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Email </label>
            <input type="email" class="form-control" name="emailAdmin">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Contraseña </label>
            <input type="password" class="form-control" name="passAdmin">
        </div>
        <div class="form-group">
            <label for="password-confirm"> Confirmar contraseña </label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <button type="submit" class="btn btn-secondary enviarAdmin">Submit</button>
</form>
</section>
@endsection