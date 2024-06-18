@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Cocedores @if($rol->newcocedor==1)<a href="{{route('newcocedor')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('cocedores.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Cedula</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
               @foreach ($datos as $cat)
				<tr>
					<td>{{ $cat->idcocedor}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->cedula}}</td>
					<td>{{ $cat->telefono}}</td>					
					<td>
						@if($rol->editcocedor==1)<a href="{{route('editcocedor',['id'=>$cat->idcocedor])}}"><button class="btn btn-warning btn-sm">Editar</button></a>
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