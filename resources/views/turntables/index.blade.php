@extends('layouts.dashboard')


@section('content')
<div class="container">
<br><br>
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-md-8">
<h2 class="card-title">Listado de Tocadiscos registrados en la base de datos</h2>
</div>
<div class="col-md-4">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<span onclick="exportturntablestoCSV(event.target)" data-href="/exportturntablestoCSV" id="export" class="btn btn-info" >Exportar a CSV</span>
 <a class="btn btn-primary" href="{{route('turntables.create')}}"><i class="fa fas-add"></i>Nuevo</a>
</div>
</div>
</div>
</div>
  <div class="card-body">
   
   <table class="table table-striped">
   
<thead>
<tr>
<th>Tocadiscos</th>
 <th>Información</th>
 <th>Descripción</th>

</tr>

</thead>
<tbody>
@forelse($turntables as $turntable)
<tr>
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
<td><p>{{$turntable->Description}}</p></td>

</tr>
@empty
<h1>La tabla no tiene datos</h1>
@endforelse
</tbody>
</table>
  </div>
</div>

<script>
   function exportturntablestoCSV(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
@endsection