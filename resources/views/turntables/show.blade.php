@extends('layouts.Dashboard')

@section('content')
<div class="container">
    <br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-title">
                        <h2>Tocadisco:{{$turntable->Mark}}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary" href="{{route('turntables.index')}}"><i
                                class="fa fas-add"></i>Regresar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tocadisco</th>
                        <th>Información</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Imagen</p>
                        <td>
                            <p><b>Modelo:</b>{{$turntable->Model}}</p>
                            <p><b>Línea:</b>{{$turntable->Line}}</p>
                            <p><b>Voltaje:</b>{{$turntable->Voltage}}</p>
                            <p><b>Velocidades de reproducción:</b>{{$turntable->Playbackspeeds}}</p>
                            <p><b>Salidas de audio:</b>{{$turntable->Audiooutputs}}</p>
                            <p><b>Con USB:</b>{{$turntable->WithUSB}}</p>
                            <p class="text-uppercase"><b class="text-lowercase">Incluye
                                    capsula:</b>{{$turntable->Includescapsule}}</p>
                        </td>
                        <td>
                            <p>{{$turntable->Description}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" href="{{route('turntables.edit',$turntable->id)}}">Editar</a>
                    <form action="{{route('turntables.destroy',$turntable->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Eliminar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection