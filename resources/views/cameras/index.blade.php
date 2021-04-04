@extends('layouts.Dashboard')

@section('content')
<div class="container">
    <br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="card-title">Listado de Camaras registradas en la base de datos</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <span onclick="exportCamerastoCSV(event.target)" data-href="/exportCamerastoCSV" id="export"
                            class="btn btn-info">Exportar a CSV</span>
                        <a class="btn btn-primary" href="{{route('cameras.create')}}"><i
                                class="fa fas-add"></i>Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Camara</th>
                        <th>Información</th>
                        <th>Descripción</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($cameras as $camera)
                    <tr>
                        <td>
                            <a class="btn btn-info btn-small" href="{{route('cameras.show',$camera->id) }}">

                                <h3>{{$camera->Typecamera}}</h3>
                            </a>
                        </td>

                        <td>
                            <p><b>Precio:</b>{{$camera->Price}}</p>
                            <p><b>Color:</b>{{$camera->Color}}</p>
                            <p><b>Vendedor:</b>{{$camera->Seller}}</p>
                            <p><b>Resolución:</b>{{$camera->Resolution}}</p>
                            <p><b>Tamaño de pantalla:</b>{{$camera->Screensize}}</p>
                            <p><b>Conectividad:</b>{{$camera->Connectivity}}</p>
                            <p><b>Sensibilidad ISO:</b>{{$camera->ISOsensitivity}}</p>

                        </td>
                        <td>
                            <p>{{$camera->Description}}</p>
                        </td>

                    </tr>
                    @empty
                    <h1>La tabla no tiene datos</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function exportCamerastoCSV(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
    </script>

    @endsection