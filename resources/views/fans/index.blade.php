@extends('layouts.Dashboard')

@section('content')
<!--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">-->
<div class="container">
<br><br>
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-8">
<h2 class="card-title">Listado de ventiladores registrados en la base de datos</h2>
</div>
<div class="col-md-4">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<span onclick="exportFanstoCSV(event.target)" data-href="/exportFanstoCSV" id="export" class="btn btn-info" >Exportar a CSV</span>
 <a class="btn btn-primary" href="{{route('fans.create')}}"><i class="fa fas-add"></i>Nuevo</a>
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
@forelse($fans as $fan)
<tr>
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
<td><p>{{$fan->Power}}</p></td>

</tr>
@empty
<h1>La tabla no tiene datos</h1>
@endforelse
</tbody>

</table>
  </div>
</div>

<script>
function exportFanstoCSV(_this){
  let _url = $(_this).data('href');
  window.location.href = _url;
}

</script>

@endsection



