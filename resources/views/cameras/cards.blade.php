@extends('layouts.Dashboard')
@section ('title','cards-Camaras')
@section('content')

<div class="container">
    <div class="row">
        @forelse($cameras as $camera)
        <!-- renderizar datos -->

        <div class="card col-xs-6 col-sm-6 col-md-5 col-lg-3 mb-3 mr-2 ml-2">

            <div class="card-header">

                <h2 class="text-primary"> Tipo de camara:{{ $camera->Typecamera}}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Conectividad:{{$camera->Connectivity }}</p>
                <div class="">
                    <p class="text-muted">Color: {{ $camera->Color }}</p>
                </div>
                <div class="">
                    <p class="text-muted">Resolucion:{{$camera->Resolution}}</p>
                </div>
            </div>
            <div class="card-footer bg-light d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-outline-info padding-left mr-2" href="{{route('cameras.show',$camera->id)}}"><i
                        class="fas fa-info"></i> Ver más</a>
            </div>
        </div>
        @empty
        <!-- Mensaje por si no encuentra los datos -->
        <h3>No hay registros en la base de datos</h3>
        @endforelse
    </div>
</div>

@endsection