@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h1>Actualizar datos de Tocadisco<b>{{$turntable->Mark}}</b></h1>

    <form action="{{route('turntables.update',$turntable->id)}}" method="post">
        @csrf
        @method('PUT')


        <input type="hidden" name="id">

        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Marca:</label>
                <input class="form-control" type="text" name="Mark" value="{{$turntable->Mark}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Linea:</label>
                <input class="form-control" type="text" name="Line" value="{{$turntable->Line}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Modelo:</label>
                <input class="form-control" type="text" name="Model" value="{{$turntable->Model}}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Voltaje:</label>
                <input class="form-control" type="text" name="Voltage" value="{{$turntable->Voltage}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Velocidades de reproducción:</label>
                <input class="form-control" type="text" name="Playbackspeeds" value="{{$turntable->Playbackspeeds}}"
                    required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Salidas de audio:</label>
                <input class="form-control" type="number" name="Audiooutputs" value="{{$turntable->Audiooutputs}}"
                    required>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Con USB:</label>
                <input class="form-control" type="text" name="WithUSB" value="{{$turntable->WithUSB}}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Con función de grabación:</label>
                <input class="form-control" type="text" name="Recording" value="{{$turntable->Recording}}" required>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Material de la bandeja giratoria:</label>
                <input class="form-control" type="text" name="TurntableMaterial"
                    value="{{$turntable->TurntableMaterial}}">
            </div>


            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Incluye capsula:</label>
                <input class="form-control" type="text" name="Includescapsule" value="{{$turntable->Includescapsule}}">
            </div>
        </div>
        <div>
        </div>




        <div>
            <label for="">Descripción:</label>
            <textarea class="form-control" name="Description" id="" cols="30" rows="10"
                required>{{$turntable->Description}}</textarea>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input class="btn btn-info" type="reset" value="Restablecer">
                <input class="btn btn-primary" type="submit" value="Guardar">

            </div>
        </div>
    </form>
</div>



@endsection