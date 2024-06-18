@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Recepciones @if($rol->newrecepcion==1)<a href="{{route('newrecepcion')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('recepcion.search')
	</div>
</div><?php $cont=0; ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Ruta</th>
					<th>Recolector</th>
					<th>Litros</th>
					<th>obervacion</th>
					<th>Opciones</th>
				</thead>
				@foreach ($datos as $dat)<?php $cont++; ?>
				<tr>
					<td>{{ $dat->idrecoleccion}}</td>
					<td>{{ $dat->fecha}}</td>
					<td>{{ $dat->ruta}}</td>
					<td>{{ $dat->recolector}}</td>
					<td>{{ $dat->litros}}</td>
					<td>{{ $dat->observacion}}</td>
					<td>
						<a href="{{route('showrecoleccion',['id'=>$dat->idrecoleccion])}}"><button class="btn btn-warning btn-xs">Ver</button></a>
				@if($rol->resultadoslab==1)	<?php if(($dat->estatus==0) and ($dat->anulada==0)){ ?>	<a href="" data-target="#modal-lab-{{$dat->idrecoleccion}}" data-toggle="modal"><button class="btn btn-info btn-xs">Lab</button></a> <?php } ?>@endif
					@if($rol->anularrecepcion==1)<?php if($dat->anulada==0){ ?>	<a href="" data-target="#modal-{{$dat->idrecoleccion}}" data-toggle="modal" ><button class="btn btn-danger btn-xs">anular</button></a> <?php } else { ?> <button class="btn btn-danger btn-xs">Anulada</button><?php } ?>@endif
					</td>
				</tr>		
				@include('recepcion.modal')	
				@include('recepcion.modalanular')				
				@endforeach
			</table>
		</div>
	
	</div>
</div>
@push ('scripts')
<script>
	$(document).ready(function(){

	});
		function buscatanque(aux,id){
		$("#tan1"+id)
		.empty() 
		var dato=$("#dep1"+id).val();

         var form= $('#form'+id);
        var url = '{{route("filtrotanque")}}';
        var data = form.serialize();
		$.post(url,data,function(result1){  
		var resultado1=result1;
          console.log(resultado1); 
          parada1=10;     
		for(j=0;j<=parada1;j++){
			var dis=(resultado1[j].capacidad-resultado1[j].uso);
		$("#tan1"+id)
		.append( 
		'<option value="'+resultado1[j].idtanque+'">'+resultado1[j].nombre+' Libre: '+dis+'</option>' );
			}
			});
		
}
		function buscatanque2(aux,id){
			//alert('anq2'+id);
		$("#tan2"+id)
		.empty() 
		var dato=$("#dep2"+id).val();
		//	alert(dato);
         var form= $('#form'+id);
        var url = '{{route("filtrotanque2")}}';
        var data = form.serialize();
		$.post(url,data,function(result1){  
		var resultado1=result1;
          console.log(resultado1); 
          parada1=10;     
		for(j=0;j<=parada1;j++){
			var dis=(resultado1[j].capacidad-resultado1[j].uso);
		$("#tan2"+id)
		.append( 
		'<option value="'+resultado1[j].idtanque+'">'+resultado1[j].nombre+' Libre: '+dis+'</option>' );
			}
			});
				if(dato>0){
				   document.getElementById('btnsendlab'+id).style.display="";
			}
}
		function enviar(id){
		 	document.getElementById('form'+id).submit(); 
			document.getElementById('btnsendlab'+id).style.display="none";
}
</script>
@endpush
@endsection