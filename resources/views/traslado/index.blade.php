@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Traslados Internos @if($rol->newtraslado==1)<a href="{{route('newtraslado')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('traslado.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Concepto</th>
					<th>Usuario</th>
					<th>Dep.Origen</th>
					<th>Dep.Destino</th>		
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $cat)
				<tr>
					<td><?php echo date("d-m-Y",strtotime($cat->fecha)); ?></td>
					<td>{{ $cat->concepto}}</td>
					<td>{{ $cat->usuario}}</td>
					<td>{{ $cat->deporigen}}</td>
					<td>{{ $cat->depdestino}}</td>

					<td>
					@if($rol->showtraslado==1)	<a href="{{route('showtraslado',['id'=>$cat->idtraslado])}}"><button class="btn btn-warning btn-xs">Ver</button></a>
					@endif
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$datos->render()}}
	</div>
</div>
@endsection