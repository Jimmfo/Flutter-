@extends('layouts.Dashboard')

@section('content')
<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}"-->
<div class="container">
    <br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="card-title">Listado de Usuarios que pueden acceder</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class='btn btn-outline-info mr-2' href="{{ url('/user/import') }}"><i
                                class="fas fa-file-import"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/user/cards') }}" alt="Vista en cards"><i
                                class="fas fa-border-all"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/user/chart') }}"><i
                                class="fas fa-chart-bar"></i></a>
                        <a class="btn btn-outline-info mr-2" href="{{ url('/user/exportToXlsx') }}"><i
                                class="fas fa-file-excel"></i></a>
                        <span onclick="exportusertoCSV(event.target)" data-href="/exportusernstoCSV" id="export"
                            class="btn btn-outline-info">
                            <i class="fas fa-file-csv"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table  id="example" class="table table-striped">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>

                    </tr>

                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            <p>{{$user->id}}</p>
                        </td>
                        <td>
                            <a class="btn btn-info btn-small" href="{{route('user.show',$user->id) }}">
                                <h3>{{$user->name}}</h3>

                            </a>
                        </td>

                        <td>
                            <p><b>Email ;</b>{{$user->email}}</p>

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


    <script>
    $(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        }););
    });
    </script>
    <script>
    function exportFanstoCSV(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
    </script>

    @endsection