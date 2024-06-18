@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Produccion @if($rol->newproceso==1)<a href="{{route('newproduccion')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('produccion.search')
	</div>
</div><?php $cont=0; ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="clientestable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Pro.</th>
					<th>Fecha</th>
					<th>Cocedor</th>
					<th>Parrilla</th>
					<th>Turno</th>
					<th>Kg Cocina</th>
					<th>Kg Bajado</th>
					<th>Kg Jalea</th>
					<th>% Rend.</th>
					<th>Opciones</th>
				</thead>
				@foreach ($datos as $dat)<?php $cont++; ?>
				<tr>
					<td>{{ $dat->idproceso}}</td>
					<td><small>{{ date("d-m-Y",strtotime($dat->fecha))}}</small></td>
					<td><small>{{ $dat->cocedor}}</small></td>
					<td>{{ $dat->parrilla}}</td>
					<td>{{ $dat->turno}}</td>
					<td>{{ $dat->kgcocina}}</td>
					<td>{{ $dat->kgbajado}}</td>
					<td>{{ $dat->kgjalea}}</td>
					<td>{{ number_format($dat->rendimiento,2,',','.')}}</td>
					<td>
					@if($rol->showproduccion==1)	<a href="{{route('showproduccion',['id'=>$dat->idproceso])}}"><button class="btn btn-warning btn-xs">Ver</button></a>@endif
					@if($rol->closeproceso==1)
					<?php if($dat->estatus==0){ ?>	<a href="" data-target="#modal-close{{$dat->idproceso}}" data-toggle="modal" ><button class="btn btn-danger btn-xs">Cerrar</button></a>
					<?php } ?>
					@endif
					</td>
				</tr>	
			@include('produccion.modal')					
				@endforeach
			</table>
				
		</div>
	{{$datos->render()}}
	</div>
</div>
@push ('scripts')
<script>
$(document).ready(function(){
	$(function () {
		$("#clientestable").DataTable({
			"order": [[ 1, 'desc' ]],
			"searching": false,
			"bPaginate": false,
			"bInfo":false,
		  "responsive": true, "lengthChange": false, "autoWidth": false
		});

	});

});
	function cerrar(id){  
	document.getElementById('benviar'+id).style.display="none";
	}
	function cerrarmodal(id){  
	$("#tobos"+id).val(0);
	$("#bajado"+id).val(0);
	$("#sobrante"+id).val(0);
	$("#kgj"+id).val(0)
	}
	function calcular(id){ 
	var cnttobo=$("#tobos"+id).val();
	var cntjalea=$("#sobrante"+id).val();
	var kgj= (parseFloat(cnttobo)*24)+parseFloat(cntjalea);
	$("#kgj"+id).val(kgj);
	}
</script>
@endpush
@endsection