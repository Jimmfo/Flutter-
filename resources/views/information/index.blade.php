@extends('layouts.Dashboard')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <h2>información</h2>
                </div>

                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre corto</th>
                        <th>Eslogan</th>
                        <th>Acciones</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($information as $info)
                    <tr>

                        <td>{{$info->name}}</td>
                        <td>{{$info->shortName}}</td>
                        <td> {{$info->slogan}}</td>
                        <td><a class="btn btn-outline-info mr-2" href="{{ route('information.edit',$info->id) }}"><i
                                    class="fas fa-edit"></i></a></td>


                    </tr>
                    @empty
                    <h1>La tabla no tiene datos</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



    @endsection