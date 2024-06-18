@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Productor: {{ $productor->nombre}}</h3>
        <form action="{{route('updateproductor')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >       
        {{csrf_field()}}

            <div class="form-group">
            	<label for="nombre">Nombre</label>
				   <input type="hidden" name="id" class="form-control" value="{{$productor->idproductor}}">
            	<input type="text" name="nombre" class="form-control"  onchange="conMayusculas(this)"  value="{{$productor->nombre}}" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
		   </div>
            <div class="form-group">
            	<label for="descripcion">Contacto</label>
            	<input type="text" name="codigo" class="form-control" value="{{$productor->codigo}}" placeholder="Codigo...">
            </div>
			<div class="form-group">
            	<label for="descripcion">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$productor->telefono}}" placeholder="telefono...">
            </div> 
						<div class="form-group">
            	<label for="descripcion">Tipo Productor</label>
				<select name="tipo" class="form-control">
	
				<option value="1" <?php if($productor->tipo==1){ echo "selected"; }?> >Vaca</option> 
				<option value="2" <?php if($productor->tipo==2){ echo "selected"; }?> >Bufala</option> 
				<option value="3" <?php if($productor->tipo==3){ echo "selected"; }?> >Ambos</option> 
		
				</select>
            </div>  			
			<div class="form-group">
            	<label for="descripcion">Ruta</label>
				<select name="ruta" class="form-control selectpicker" data-live-search="true">
				@foreach ($ruta as $r)
				<option value="{{$r -> idruta}}" <?php if($r->idruta==$productor->idruta) { echo "selected"; }?>>{{$r -> nombre}}</option> 
				@endforeach
				</select>
            </div> 			
		</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">	
            <div class="form-group">
				<button class="btn btn-danger btn-sm" id="btncancelar" type="reset">Cancelar</button>
            	<button class="btn btn-primary btn-sm" id="btnguardar" type="submit">Guardar</button>
				<div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}"></div>
            </div>	
			</div> 	</form>  
	</div>
@endsection
  @push('scripts')
<script>
        $(document).ready(function(){
			$('#btnguardar').click(function(){   
		document.getElementById('loading').style.display=""; 
		document.getElementById('btnguardar').style.display="none"; 
		document.getElementById('btncancelar').style.display="none"; 
		document.getElementById('formcategoria').submit(); 
		})
       });
	    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}
</script>
@endpush