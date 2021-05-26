@extends('layouts.Dashboard')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <h2>Listado de plachas registradas en la base de datos</h2>
                </div>

                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-info mr-2" href="{{ route('irons.create') }}"><i
                                class="fas fa-plus-circle"></i></a>
                        <a class='btn btn-outline-info mr-2' href="{{ url('/irons/import') }}"><i
                                class="fas fa-file-import"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/irons/cards') }}" alt="Vista en cards"><i
                                class="fas fa-border-all"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/irons/chart') }}"><i
                                class="fas fa-chart-bar"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/irons/exportToXlsx') }}"><i
                                class="fas fa-file-excel"></i></a>
                        <span onclick="exportironstoCSV(event.target)" data-href="/exportIronstoCSV" id="export"
                            class="btn btn-outline-info">
                            <i class="fas fa-file-export-xml">xml</i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped">

                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Plancha</th>
                        <th>Información</th>
                        <th>Descripción</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($irons as $iron)
                    <tr>
                        <td>
                            <img style="width:200px; height:100; object-fit:cover;"
                                src="/imagenes/planchas/{{$iron->image}}" alt="{{$iron->Model}}">
                            </img>
                        </td>
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

    <!-- DataTables -->
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <!-- Aplicación de DataTable -->
    <script>
    $(function() {
        $('#example').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'csv', 'pdf', 'print'
            ],
        });
    });
    </script>


    <script>
    function exportironstoCSV(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
    </script>


    @endsection