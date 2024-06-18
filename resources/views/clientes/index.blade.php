@extends ('layouts.master')
@section ('contenido')
@include('clientes.cliente.empresa')
	<div class="row" id="principal">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Clientes 
			@if($rol->newcliente==1)<a href="{{route('newcliente')}}">
			<button class="btn btn-primary btn-sm"> Nuevo</button>@endif</a></h3>
		@include('clientes.search')
	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="clientestable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Cedula</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $cat)
				<tr>
					<td><small>{{ $cat->nombre}}</small></td>
					<td><small>{{ $cat->cedula}}</small></td>
					<td><small>{{ $cat->telefono}}</small></td>
					<td><small><small> <?php echo substr( $cat->direccion, 0, 20 ); ?></small></small></td>
					<td>
					@if($rol->editcliente==1)<a href="{{route('editcliente',['id'=>$cat->idcliente])}}"><button class="btn btn-warning btn-xs">Editar</button></a>@endif
					</td>
				</tr>
				
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
		"searching": false,
		"bPaginate": false,
		"bInfo":false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#clientestable_wrapper .col-md-6:eq(0)');

  });
});
</script>
@endpush
@endsection