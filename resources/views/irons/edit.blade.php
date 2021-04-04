@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Actualizar datos de la plancha<b>{{$iron->Mark}}</b></h1>
    <form action="{{route('irons.update',$iron->id)}}" method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="id">

        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Marca:</label>
                <input class="form-control" type="text" name="Mark" value="{{$iron->Mark}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Linea:</label>
                <input class="form-control" type="text" name="Line" value="{{$iron->Line}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Modelo:</label>
                <input class="form-control" type="text" name="Model" value="{{$iron->Model}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Color:</label>
                <input class="form-control" type="text" name="Color" value="{{$iron->Color}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Voltaje:</label>
                <input class="form-control" type="number" name="Voltage" value="{{$iron->Voltage}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Potencia:</label>
                <input class="form-control" type="number" name="Power" value="{{$iron->Power}}" required>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">TIpo de plancha:</label>
                <input class="form-control" type="text" name="Typeofiron" value="{{$iron->Typeofiron}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Uso:</label>
                <input class="form-control" type="text" name="Use" value="{{$iron->Use}}" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Comentarios:</label>
                <input class="form-control" type="text" name="Coment" value="{{$iron->Coment}}">
            </div>
        </div>
        <div>
            <label for="">Descripción:</label>
            <textarea class="form-control" name="Description" id="" cols="30" rows="10"
                required>{{$iron->Description}}</textarea>
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