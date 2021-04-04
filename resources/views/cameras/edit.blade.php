@extends('layouts.Dashboard')

@section('content')
<div class="container">

    <h1>Actualizar datos de la camara<b>{{$camera->Typecamera}}</b></h1>

    <form action="{{route('cameras.update',$camera->id)}}" method="post">
        @csrf
        @method('PUT')


        <input type="hidden" name="id">

        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Precio:$</label>
                <input class="form-control" type="text" name="Price" value="{{$camera->Price}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Vendedor:</label>
                <input class="form-control" type="text" name="Seller" value="{{$camera->Seller}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Color:</label>
                <input class="form-control" type="text" name="Color" value="{{$camera->Color}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Tipo de camara:</label>
                <input class="form-control" type="text" name="Typecamera" value="{{$camera->Typecamera}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Resolución:</label>
                <input class="form-control" type="number" name="Resolution" value="{{$camera->Resolution}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Tamaño de pantalla:</label>
                <input class="form-control" type="number" name="Screensize" value="{{$camera->Screensize}}" required>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Conectividad:</label>
                <input class="form-control" type="text" name="Connectivity" value="{{$camera->Connectivity}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">ISO de Sensibilidad:</label>
                <input class="form-control" type="text" name="ISOsensitivity" value="{{$camera->ISOsensitivity}}"
                    required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Interfaces:</label>
                <input class="form-control" type="text" name="Interfaces" value="{{$camera->Interfaces}}">
            </div>
        </div>
        <div>
            <label for="">Descripción:</label>
            <textarea class="form-control" name="Description" id="" cols="30" rows="10"
                required>{{$camera->Description}}</textarea>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-info" type="reset" value="Restablecer">
                <input class="btn btn-primary" type="submit" value="Guardar">

            </div>
        </div>
    </form>
</div>


@endsection