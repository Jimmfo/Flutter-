@extends('layouts.Dashboard')

@section('content')
<div class="container">
    <h1>Actualizar datos</h1>

    <form action="{{ route('information.update', $information->id) }}" method="post">

        @csrf
        @method('PUT')

        <input type="hidden" name="id">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-6">
                <label for="">Nombre del sistema: </label>
                <input class="form-control" type="text" name="name" value="{{ $information->name }}" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-6">
                <label for="">Nombre corto: </label>
                <input class="form-control" type="text" name="shortName" value="{{ $information->shortName }}" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <label for="">Eslogan: </label>
                <input class="form-control" type="text" name="slogan" value="{{ $information->slogan }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-6">
                <label for="">Teléfono: </label>
                <input class="form-control" type="tel" name="phone" value="{{ $information->phone }}" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-6">
                <label for="">Correo electrónico: </label>
                <input class="form-control" type="email" name="email" value="{{ $information->email }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-xl-8">
                <label for="">Copyright: </label>
                <input class="form-control" type="text" name="copyright" value="{{ $information->copyright }}" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4">
                <label for="">Versión del sistema: </label>
                <input class="form-control" type="text" name="version" value="{{ $information->version }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <label for="">Eslogan: </label>
                <input class="form-control" type="text" name="slogan" value="{{ $information->slogan }}" required>
            </div>
        </div>

        <div>
            <label for="">Dirección: </label>
            <input class="form-control" type="text" name="address" value="{{ $information->address }}">
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn btn-info" type="reset" value="Restablecer">
            <input class="btn btn-primary" type="submit" value="Guardar cambios">
        </div>

    </form>

</div>


@endsection