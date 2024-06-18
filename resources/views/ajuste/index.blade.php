@extends ('layouts.master')
@section ('contenido')
<div>
	<div class="col-lg-12 col-md-2 col-sm-12 col-xs-12">
		<h3>Ajustes 
		@if($rol->newajuste==1) <a href="{{route('newajuste')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('ajuste.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				
					<th>Fecha</th>
					<th>Concepto</th>
					<th>Responsable</th>
					<th>Valorizado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $ing)
				<tr>
					
					<td><?php echo date("d-m-Y",strtotime($ing->fecha)); ?></td>
					<td>{{ $ing->concepto}}</td>
					<td>{{ $ing->usuario}}</td>
					<td><?php echo number_format( $ing->monto, 2,',','.'); ?></td>
				
				
					<td>	@if($rol->showajuste==1)
				<a href="{{route('showajuste',['id'=>$ing->idajuste])}}"><button class="btn btn-primary btn-xs">Detalles</button></a>
					@endif
					</td>
				</tr>
			@include('ajuste.modal')
				@endforeach
			</table>
		</div>
		{{$datos->render()}}
	</div>
</div>

@endsection