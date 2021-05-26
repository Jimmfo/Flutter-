@extends('layouts.Dashboard')

@section('content')
<div class="container">

    <h1>Formulario para crear un nuevo registro</h1>

    <form action="{{route('fans.store')}}" method="post">
        @csrf
        <br>
        <div class="row mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <label for="">Imagen:</label>
                <input type="file" name="image" id="" accept="image/*" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Marca:</label>
                <input class="form-control" type="text" name="Mark" id="" placeholder="Marca" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Modelo:</label>
                <input class="form-control" type="text" name="Model" id="" placeholder="Modelo" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Diametro:</label>
                <input class="form-control" type="number" name="Diameter" id="" placeholder="Diametro" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Precio:</label>
                <input class="form-control" type="text" name="Price" id="" placeholder="Precio" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Vendedor:</label>
                <input class="form-control" type="text" name="Seller" id="" placeholder="Vendedor" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Voltaje:</label>
                <input class="form-control" type="number" name="Voltage" id="" placeholder="Voltaje" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Tipo de Ventilador:</label>
                <input class="form-control" type="text" name="Fantype" id="" placeholder="Tipo de ventilador" required>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Potencia:</label>
                <input class="form-control" type="number" name="Power" id="" placeholder="Potencia" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Velocidades:</label>
                <input class="form-control" type="number" name="Speeds" id="" placeholder="Velocidades" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Control remoto:</label>
                <input class="form-control" type="text" name="Remotecontrol" id="" placeholder="Control Remoto">
            </div>
        </div>
        <div>
            <label for="">Alimentación:</label>
            <textarea class="form-control" name="Feeding" id="" cols="30" rows="10" required></textarea>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-info" type="reset" value="Restablecer">
                <input class="btn btn-primary" type="submit" value="Guardar">

            </div>
        </div>
    </form>
</div>
@endsection