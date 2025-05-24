@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Articulos @if($rol->newarticulo==1)<a href="{{route('newarticulos')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('articulo.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
				@if($rol->stock==1)	<th>Stock</th>@endif
						<th>Precio</th>
					<th>Opciones</th>
				</thead>
				<?php $cnt=0;  $acumexistencia=0;  if($jalea != NULL){ $cnt=$jalea->existencia; } ?>
               @foreach ($datos as $cat)
				<tr>
					<td>{{ $cat->nombre}}	@if($rol->entobar==1)	<?php if(($cat->idarticulo==1)and($cnt>0)) {?>
						 <a data-target="#modal-tobo{{$cat->idarticulo}}" data-toggle="modal">   <img  src="{{asset('dist/img/tobo2.png')}}"  alt="Entobar" height="25" width="25"></a>
				<?php	}?>@endif</td>
				@if($rol->stock==1)<td><a href="" data-target="#modal-existencia-{{$cat->idarticulo}}" data-toggle="modal">{{ $cat->stock}}</a>@include('articulo.modal_existencia')</td>@endif
					<td>{{ $cat->precio}}</td>
					<td>
					@if($rol->editarticulo==1)	
						<a href="{{route('editarticulos',['id'=>$cat->idarticulo])}}"><button class="btn btn-warning btn-sm">Editar</button></a>
					@endif
						@if($rol->stock==1)<a href="{{route('showarticulos',['id'=>$cat->idarticulo])}}"><button class="btn btn-info btn-sm">Kardex</button></a> @endif
					</td>
				</tr>
				
				@endforeach
			</table>
			@include('articulo.modal')	
		</div>
		{{$datos->render()}}
	</div>
</div>
@push ('scripts')
<script>
$(document).ready(function(){
	$('#send').click(function(){	
		document.getElementById('send').style.display="none";
	});
		$('#cerrar').click(function(){
		$("#cnt").val("");
		document.getElementById('send').style.display="";
	});

});
</script>
@endpush
@endsection