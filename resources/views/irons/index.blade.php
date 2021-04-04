@extends('layouts.Dashboard')

@section('content')
<div class="container">
    <br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="card-title">Listado de plachas registradas en la base de datos</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <span onclick="exportironstoCSV(event.target)" data-href="/exportIronstoCSV" id="export"
                            class="btn btn-info">Exportar a CSV</span>
                        <a class="btn btn-primary" href="{{route('irons.create')}}"><i class="fa fas-add"></i>Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Plancha</th>
                        <th>Información</th>
                        <th>Descripción</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($irons as $iron)
                    <tr>
                        <td>
                            <a class="btn btn-info btn-small" href="{{route('irons.show',$iron->id) }}">

                                <h3>{{$iron->Mark}}</h3>
                            </a>
                        </td>

                        <td>
                            <p><b>Modelo:</b>{{$iron->Model}}</p>
                            <p><b>Color:</b>{{$iron->Color}}</p>
                            <p><b>Linea:</b>{{$iron->Line}}</p>
                            <p><b>Voltaje:</b>{{$iron->Voltage}}</p>
                            <p><b>Potencia:</b>{{$iron->Power}}</p>
                            <p><b>Tipo de plancha:</b>{{$iron->Typeofiron}}</p>
                            <p><b>Uso:</b>{{$iron->Use}}</p>

                        </td>
                        <td>
                            <p>{{$iron->Description}}</p>
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
    function exportironstoCSV(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
    </script>


    @endsection