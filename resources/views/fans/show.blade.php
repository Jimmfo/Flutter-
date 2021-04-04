@extends('layouts.Dashboard')

@section('content')
<div class="container">
<br><br>
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-8">
<div class="card-title">
<h2 >Ventilador:{{$fan->Mark}}</h2>
</div>
</div>
<div class="col-md-4">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
 <a class="btn btn-primary" href="{{route('fans.index')}}"><i class="fa fas-add"></i>Regresar</a>
</div>
</div>
</div>
</div>
  <div class="card-body">   
   <table class="table table-striped">   
<thead>
<tr>
<th>Ventilador</th>
 <th>Información</th>
 <th>Potencia</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<p>Imagen</p>
<td>
<p><b>Modelo:</b>{{$fan->Model}}</p>
<p><b>Precio:</b>{{$fan->Price}}</p>
<p><b>Vendedor:</b>{{$fan->Seller}}</p>
<p><b>Voltaje:</b>{{$fan->Voltage}}</p>
<p><b>Potencia:</b>{{$fan->Power}}</p>
<p><b>Tipo de ventilador:</b>{{$fan->Fantype}}</p>
<p class="text-uppercase"><b class="text-lowercase">Velocidades:</b>{{$fan->Speeds}}</p>
</td>
<td><p>{{$fan->Power}}</p></td>
</tr>
</tbody>
</table>
  </div>
<div class="card-footer">
<div class="col">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
 <a class="btn btn-primary" href="{{route('fans.edit',$fan->id)}}">Editar</a>
 <form action="{{route('fans.destroy',$fan->id)}}" method="post">
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