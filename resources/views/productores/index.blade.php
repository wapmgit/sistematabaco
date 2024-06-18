@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Productores @if($rol->newproductor==1)<a href="{{route('newproductor')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('productores.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive" >
			<table id="clientestable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Telefono</th>
					<th>Tipo</th>
					<th>Ruta</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $cat)
				<tr>
					<td>{{ $cat->idproductor}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->telefono}}</td>
					<td> 
					<?php 
					if($cat->tipo==1){ echo "Vaca"; } 
					if($cat->tipo==2){ echo "Bufala"; } 
					if($cat->tipo==3){ echo "Ambos"; } 					
					?> 
					
					</td>
					<td>{{ $cat->ruta}}</td>
					<td>
					@if($rol->editproductor==1)	<a href="{{route('editproductor',['id'=>$cat->idproductor])}}"><button class="btn btn-warning btn-sm">Editar</button></a>
					@endif
					</td>
				</tr>
				
				@endforeach
				
			</table>
		
		</div>
	
	</div>
</div>
@push ('scripts')
<script>
$(document).ready(function(){
	$(function () {
    $("#clientestable").DataTable({
		"searching": false,
		"bPaginate": true,
		"bInfo":false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#clientestable_wrapper .col-md-6:eq(0)');

  });
});
</script>
@endpush
@endsection