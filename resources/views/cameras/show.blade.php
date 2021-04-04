@extends('layouts.Dashboard')

@section('content')
<div class="container">
<br><br>
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-8">
<div class="card-title">
<h2 >Plancha:{{$camera->Typecamera}}</h2>
</div>
</div>
<div class="col-md-4">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
 <a class="btn btn-primary" href="{{route('cameras.index')}}"><i class="fa fas-add"></i>Regresar</a>
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
<tr>
<td>
<p>Imagen</p>
<td>
<p><b>Precio:$</b>{{$camera->Price}}</p>
<p><b>Color:</b>{{$camera->Color}}</p>
<p><b>Vendedor:</b>{{$camera->Seller}}</p>
<p><b>Resolución:</b>{{$camera->Resolution}}</p>
<p><b>Tamaño de pantalla:</b>{{$camera->Screensize}}</p>
<p><b>Conectividad:</b>{{$camera->Connectivity}}</p>
<p><b>Interfaces:</b>{{$camera->Interfaces}}</p>


<p class="text-uppercase"><b class="text-lowercase">Sensibilidad ISO:</b>{{$camera->ISOsensitivity}}</p>
</td>
<td><p>{{$camera->Description}}</p></td>
</tr>
</tbody>
</table>
  </div>
<div class="card-footer">
<div class="col">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
 <a class="btn btn-primary" href="{{route('cameras.edit',$camera->id)}}">Editar</a>
 <form action="{{route('cameras.destroy',$camera->id)}}" method="post">
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