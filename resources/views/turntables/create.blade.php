@extends('layouts.Dashboard')

@section('content')
<div class="container">

<h1>Formulario para crear un nuevo registro</h1>

<form action="{{route('turntables.store')}}" method="post">
@csrf
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Marca:</label>
<input class="form-control" type="text" name="Mark" id="" placeholder="Marca" required>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Línea:</label>
<input class="form-control" type="text" name="Line" id="" placeholder="Línea" required>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Modelo:</label>
<input class="form-control" type="text" name="Model" id="" placeholder="Modelo" required>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Voltaje:</label>
<input class="form-control" type="number" name="Voltage" id="" placeholder="Voltaje" required>
</div>
</div>
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4" >
<label for="">Velocidades de reproducción:</label>
<input class="form-control" type="text" name="Playbackspeeds" id="" placeholder="Velocidades de reproducción" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Salidas de audio:</label>
<input class="form-control" type="number" name="Audiooutputs" id="" placeholder="Salidas de audio" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Con USB:</label>
<input  class="form-control" type="text" name="WithUSB" id="" placeholder="USB" required>
</div>

</div>
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4" >
<label for="">Con función de Grabación:</label>
<input class="form-control" type="text" name="Recording" id="" placeholder="Función de grabación" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Material de la bandeja giratoria:</label>
<input class="form-control" type="text" name="TurntableMaterial" id="" placeholder="Material de la bandeja giratoria" required>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Incluye cápsula:</label>
<input class="form-control" type="text" name="Includescapsule" id="" placeholder="Incluye capsula">
</div>
</div>
<div>
<label for="">Descripción:</label>
<textarea class="form-control" name="Description" id="" cols="30" rows="10" required></textarea>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<input class="btn btn-info" type="reset" value="Restablecer">
<input  class="btn btn-primary" type="submit" value="Guardar">

</div>
</div>
</form>
</div>




@endsection