@extends ('layouts.master')
@section ('contenido')
<?php $cont=0;?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Depositos @if($rol->newdeposito==1)<a href="{{route('newdeposito')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('deposito.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Encargado</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $cat)<?php $cont++;
			   if($cat->iddeposito==1){?>
					<td>{{ $cat->iddeposito}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->encargado}}</td>
					<td>{{ $cat->movil}}</td>
					<td>
					@if($rol->editdeposito==1)	<a href="{{route('editdeposito',['id'=>$cat->iddeposito])}}"><button class="btn btn-warning btn-xs">Editar</button></a>@endif
					@if($rol->deposito==1) 
		<a href="{{route('showdeposito',['id'=>$cat->iddeposito])}}"><button class="btn btn-info btn-xs">Ver</button></a>@endif

					</td>
				</tr>  
			   <?php }else{			   
			   ?>
				<tr>
					<td>{{ $cat->iddeposito}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->encargado}}</td>
					<td>{{ $cat->movil}}</td>
					<td>
					@if($rol->editdeposito==1)	<a href="{{route('editdeposito',['id'=>$cat->iddeposito])}}"><button class="btn btn-warning btn-xs">Editar</button></a>@endif
					@if($rol->showdeposito==1) 
		<a href="{{route('showdeposito',['id'=>$cat->iddeposito])}}"><button class="btn btn-info btn-xs">Ver</button></a>@endif

					</td>
				</tr>
			   <?php } ?>
				@endforeach
			</table>
		</div>
		{{$datos->render()}}
	</div>
</div>
@push ('scripts')
<script>
	$(document).ready(function(){
	});
function enviadatos(id){	
		var optb=$("#btn"+id);	
		document.getElementById('btn'+id).style.display="none";
}
</script>
@endpush
@endsection