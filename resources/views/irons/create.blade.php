@extends('layouts.Dashboard')

@section('content')
<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">-->
<div class="container">

    <h1>Formulario para crear un nuevo registro</h1>

    <form action="{{route('irons.store')}}" method="post">
        @csrf
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <label for="">Imagen:</label>
                <input type="file" name="image" id="" accept="Image/*" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Marca:</label>
                <input class="form-control" type="text" name="Mark" id="" placeholder="Marca" required>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                    <label for="">Linea:</label>
                    <input class="form-control" type="text" name="Line" id="" placeholder="Linea" required>
                </div>
                <div class="row ">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-xl-5">
                        <label for="">Modelo:</label>
                        <input class="form-control" type="text" name="Model" id="" placeholder="Modelo" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">Color:</label>
                        <input class="form-control" type="text" name="Color" id="" placeholder="Color" required>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">Voltaje:</label>
                        <input class="form-control" type="number" name="Voltage" id="" placeholder="Voltaje" required>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">Potencia:</label>
                        <input class="form-control" type="number" name="Power" id="" placeholder="Potencia" required>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">TIpo de plancha:</label>
                        <input class="form-control" type="text" name="Typeofiron" id="" placeholder="Tipo de planca"
                            required>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">Uso:</label>
                        <input class="form-control" type="text" name="Use" id="" placeholder="Uso" required>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                        <label for="">Comentarios:</label>
                        <input class="form-control" type="text" name="Coment" id="" placeholder="Comentarios">
                    </div>
                </div>
                <div>
                    <label for="">Descripción:</label>
                    <textarea class="form-control" name="Description" id="" cols="30" rows="10" required></textarea>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input class="btn btn-info" type="reset" value="Restablecer">
                        <input class="btn btn-primary" type="submit" value="Guardar">

                    </div>
                </div>
    </form>
</div>



@endsection