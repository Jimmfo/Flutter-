@extends('layouts.Dashboard')

@section('content')
<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">-->
<div class="container">


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <h2>Listado de ventiladores registrados en la base de datos</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-info mr-2" href="{{ route('fans.create') }}"><i
                                class="fas fa-plus-circle"></i></a>
                        <a class='btn btn-outline-info mr-2' href="{{ url('/fans/import') }}"><i
                                class="fas fa-file-import"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/fans/cards') }}" alt="Vista en cards"><i
                                class="fas fa-border-all"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/fans/chart') }}"><i
                                class="fas fa-chart-bar"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/fans/exportToXlsx') }}"><i
                                class="fas fa-file-excel"></i></a>
                        <span onclick="exportFanstoCSV(event.target)" data-href="/exportFanstoCSV" id="export"
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
                        <th>Ventilador</th>
                        <th>Información</th>
                        <th>Potencia</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($fans as $fan)
                    <tr>
                        <td>
                            <img style="width:200px; height:100; object-fit:cover;"
                                src="/imagenes/Ventilador/{{$fan->image}}" alt="{{$fan->Model}}">
                            </img>
                        </td>
                        <td>
                            <a class="btn btn-info btn-small" href="{{route('fans.show',$fan->id) }}">

                                <h3>{{$fan->Mark}}</h3>
                            </a>
                        </td>

                        <td>
                            <p><b>Modelo:</b>{{$fan->Model}}</p>
                            <p><b>Precio$:</b>{{$fan->Price}}</p>
                            <p><b>Vendedor:</b>{{$fan->Seller}}</p>
                            <p><b>Voltaje:</b>{{$fan->Voltage}}</p>
                            <p><b>Tipo de Ventilador:</b>{{$fan->Fantype}}</p>
                            <p><b>Velocidades:</b>{{$fan->Speeds}}</p>
                            <p><b>Alimentación:</b>{{$fan->Feeding}}</p>

                        </td>
                        <td>
                            <p>{{$fan->Power}}</p>
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
    function exportFanstoCSV(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
    </script>

    @endsection