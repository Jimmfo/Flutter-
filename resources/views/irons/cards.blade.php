@extends('layouts.Dashboard')
@section ('title','cards-planchas')
@section('content')

<div class="container">
    <div class="row">
        @forelse($irons as $iron)
        <!-- renderizar datos -->

        <div class="card col-xs-6 col-sm-6 col-md-5 col-lg-3 mb-3 mr-2 ml-2">

            <div class="card-header">

                <h2 class="text-primary">Modelo:{{ $iron->Model}}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Color:{{$iron->Color }}</p>
                <div class="">
                    <p class="text-muted">Linea:{{$iron->Line}}</p>
                </div>
                <div class="">
                    <p class="text-muted">Voltaje:{{{$iron->Voltage}}}</p>
                </div>
            </div>
            <div class="card-footer bg-light d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-outline-info padding-left mr-2" href="{{route('irons.show',$iron->id)}}"><i
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