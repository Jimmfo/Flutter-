@extends('layouts.Dashboard')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <h3>Listado de Camaras registradas en la base de datos</h3>
                </div>

                <div class="col-md-4">

                    <a class="btn btn-outline-info mr-2" href="{{ route('cameras.create') }}"><i
                            class="fas fa-plus-circle"></i></a>
                    <a class='btn btn-outline-info mr-2' href="{{ url('/cameras/import') }}"><i
                            class="fas fa-file-import"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/cameras/cards') }}" alt="Vista en cards"><i
                            class="fas fa-border-all"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/cameras/chart') }}"><i
                            class="fas fa-chart-bar"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/cameras/exportToXlsx') }}"><i
                            class="fas fa-file-excel"></i></a>
                    <span onclick="exportCamerastoCSV(event.target)" data-href="/exportCamerastoCSV" id="export"
                        class="btn btn-outline-info">
                        <i class="fas fa-file-export-xml ">xml</i>
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
                    <th>Camara</th>
                    <th>Información</th>
                    <th>Descripción</th>

                </tr>

            </thead>
            <tbody>
                @forelse($cameras as $camera)
                <tr>
                    <td>
                        <img style="width:200px; height:100; object-fit:cover;"
                            src="/imagenes/camaras/{{$camera->image}}" alt="{{$camera->Typecamera}}">
                        </img>
                    </td>
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
function exportCamerastoCSV(_this) {
    let _url = $(_this).data('href');
    window.location.href = _url;
}
</script>



@endsection