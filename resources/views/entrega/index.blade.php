@extends ('layouts.master')
@section ('contenido')
<?php 
$ceros=5;
function add_ceros($numero,$ceros) {
  $numero=$numero;
$digitos=strlen($numero);
  $recibo=" ";
  for ($i=0;$i<8-$digitos;$i++){
    $recibo=$recibo."0";
  }
return $insertar_ceros = $recibo.$numero;
};
?>	
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Ventas @if($rol->newventa==1)<a href="{{route('newentrega')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('entrega.search')
	</div>
</div><?php $cont=0; ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="ventastable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Documento</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Total</th>
					<th>Usuario</th>
					<th>Opciones</th>
				</thead>
				@foreach ($datos as $dat)<?php $cont++; ?>
				<tr>
					<td><?php echo "FAC".add_ceros($dat->identrega,$ceros); ?></td>
					<td><?php echo date("d-m-Y",strtotime($dat->fecha)); ?></td>
					<td>{{ $dat->nombre}}</td>
					<td>{{ $dat->totalventa}}</td>
					<td>{{ $dat->usuario}}</td>
					<td>
					 @if($rol->showventa==1)	<a href="{{route('showentrega',['id'=>$dat->identrega])}}"><button class="btn btn-primary btn-xs">Ver</button></a>@endif
					 @if($rol->anularventa==1)	<?php if($dat->status==0){?>
						<a href="" data-target="#modal-cerrar{{$dat->identrega}}" data-toggle="modal" ><button class="btn btn-danger btn-xs">Anular</button></a>
						<?php }else{ ?>
						<button class="btn btn-danger btn-xs disabled">Anulada</button><?php } ?>
						@endif
					</td>
				</tr>			
				@include('entrega.modal')
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
    $("#ventastable").DataTable({
		"searching": false,
		"bPaginate": false,
		"bInfo":false,
      "responsive": true, "lengthChange": false, "autoWidth": false

    });

  });
});

</script>
@endpush
@endsection