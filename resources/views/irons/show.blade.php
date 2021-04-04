@extends('layouts.Dashboard')

@section('content')
<div class="container">
    <br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-title">
                        <h2>Plancha:{{$iron->Mark}}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary" href="{{route('irons.index')}}"><i
                                class="fa fas-add"></i>Regresar</a>
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
                    <tr>
                        <td>
                            <p>Imagen</p>
                        <td>
                            <p><b>Modelo:</b>{{$iron->Model}}</p>
                            <p><b>Color:</b>{{$iron->Color}}</p>
                            <p><b>Linea:</b>{{$iron->Line}}</p>
                            <p><b>Voltaje:</b>{{$iron->Voltage}}</p>
                            <p><b>Potencia:</b>{{$iron->Power}}</p>
                            <p><b>Tipo de plancha:</b>{{$iron->Typeofiron}}</p>
                            <p class="text-uppercase"><b class="text-lowercase">Uso:</b>{{$iron->Use}}</p>
                        </td>
                        <td>
                            <p>{{$iron->Description}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" href="{{route('irons.edit',$iron->id)}}">Editar</a>
                    <form action="{{route('irons.destroy',$iron->id)}}" method="post">
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