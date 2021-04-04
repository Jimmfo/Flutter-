@extends('layouts.Dashboard')

@section('content')
<div class="container">

<h1>Formulario para crear un nuevo registro</h1>

<form action="{{route('cameras.store')}}" method="post">
@csrf
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Precio:$</label>
<input class="form-control" type="number" name="Price" id="" placeholder="Precio" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Vendedor:</label>
<input class="form-control" type="text" name="Seller" id="" placeholder="Vendedor" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Color:</label>
<input class="form-control" type="text" name="Color" id="" placeholder="Color" required>
</div>
</div>
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4" >
<label for="">Tipo de camara:</label>
<input class="form-control" type="text" name="Typecamera" id="" placeholder="Tipo de Camara" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Resolución:</label>
<input class="form-control" type="number" name="Resolution" id="" placeholder="Resolucion" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Tamaño de la pantalla:</label>
<input  class="form-control" type="number" name="Screensize" id="" placeholder="Tamaño de la pantalla" required>
</div>



</div>
<br>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4" >
<label for="">Conectividad:</label>
<input class="form-control" type="text" name="Connectivity" id="" placeholder="conectividad" required>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">ISO de conectividad:</label>
<input class="form-control" type="text" name="ISOsensitivity" id="" placeholder="ISO de conectividad" required>
</div>

<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
<label for="">Interfaces:</label>
<input  class="form-control" type="text" name="Interfaces" id="" placeholder="Interfaces" required>
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