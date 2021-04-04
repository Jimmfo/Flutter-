@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h1>Actualizar datos de Ventilador<b>{{$fan->Mark}}</b></h1>

    <form action="{{route('fans.update',$fan->id)}}" method="post">
        @csrf
        @method('PUT')


        <input type="hidden" name="id">

        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Marca:</label>
                <input class="form-control" type="text" name="Mark" value="{{$fan->Mark}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Precio:</label>
                <input class="form-control" type="text" name="Price" value="{{$fan->Price}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Vendedor:</label>
                <input class="form-control" type="text" name="Seller" value="{{$fan->Seller}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Diametro:</label>
                <input class="form-control" type="text" name="Diameter" value="{{$fan->Diameter}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Voltaje:</label>
                <input class="form-control" type="number" name="Voltage" value="{{$fan->Voltage}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Velocidades:</label>
                <input class="form-control" type="number" name="Speeds" value="{{$fan->Speeds}}" required>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">TIpo de ventilador:</label>
                <input class="form-control" type="text" name="Fantype" value="{{$fan->Fantype}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Control Remoto:</label>
                <input class="form-control" type="text" name="Remotecontrol" value="{{$fan->RemoteControl}}" required>
            </div>


        </div>
        <div>
            <label for="">Alimentación:</label>
            <textarea class="form-control" name="Feeding" id="" cols="30" rows="10"
                required>{{$fan->Feeding}}</textarea>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-info" type="reset" value="Restablecer">
                <input class="btn btn-primary" type="submit" value="Guardar">

            </div>
        </div>

        <body class="color-red">
    </form>
</div>
@endsection