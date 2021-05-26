@extends('layouts.dashboard')


@section('content')


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-7">
                <h2>Listado de Tocadiscos registrados en la base de datos</h2>
            </div>
            <div class="col-md-4">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-outline-info mr-2" href="{{ route('turntables.create') }}"><i
                            class="fas fa-plus-circle"></i></a>
                    <a class='btn btn-outline-info mr-2' href="{{ url('/turntables/import') }}"><i
                            class="fas fa-file-import"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/turntables/cards') }}" alt="Vista en cards"><i
                            class="fas fa-border-all"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/turntables/chart') }}"><i
                            class="fas fa-chart-bar"></i></a>
                    <a class="btn btn-outline-info mr-2" href="{{ url('/turntables/exportToXlsx') }}"><i
                            class="fas fa-file-excel"></i></a>
                    <span onclick="exportturntablestoCSV(event.target)" data-href="/exportturntablestoCSV" id="export"
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
                    <th>Tocadiscos</th>
                    <th>Información</th>
                    <th>Descripción</th>

                </tr>

            </thead>
            <tbody>
                @forelse($turntables as $turntable)
                <tr>
                    <td>
                        <img style="width:200px; height:100; object-fit:cover;"
                            src="/imagenes/tocadiscos/{{$turntable->image}}" alt="{{$turntable->Mark}}">
                        </img>
                    </td>
                    <td>
                        <a class="btn btn-info btn-small" href="{{route('turntables.show',$turntable->id) }}">

                            <h3>{{$turntable->Mark}}</h3>
                        </a>
                    </td>

                    <td>
                        <p><b>Modelo:</b>{{$turntable->Model}}</p>
                        <p><b>Línea:</b>{{$turntable->Line}}</p>
                        <p><b>Velocidades de reproducción:</b>{{$turntable->Playbackspeeds}}</p>
                        <p><b>Voltaje:</b>{{$turntable->Voltage}}</p>
                        <p><b>Con USB:</b>{{$turntable->WithUSB}}</p>
                        <p><b>Grabación:</b>{{$turntable->Recording}}</p>
                        <p><b>Material de la bandeja giratoria:</b>{{$turntable->TurntableMaterial}}</p>
                    </td>
                    <td>
                        <p>{{$turntable->Description}}</p>
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
        buttons: ['csv', 'pdf', 'print'],
    });
});
</script>


<script>
function exportturntablestoCSV(_this) {
    let _url = $(_this).data('href');
    window.location.href = _url;
}
</script>
@endsection