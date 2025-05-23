@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cocedor: {{ $recolector->nombre}}</h3>
        <form action="{{route('updatecocedor')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >       
        {{csrf_field()}}

            <div class="form-group">
            	<label for="nombre">Nombre</label>
				   <input type="hidden" name="id" class="form-control" value="{{$recolector->idcocedor}}">
            	<input type="text" name="nombre" class="form-control"  onchange="conMayusculas(this)"  value="{{$recolector->nombre}}" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
		   </div>
			<div class="form-group">
            	<label for="descripcion">Cedula</label>
            	<input type="text" name="cedula" class="form-control" value="{{$recolector->cedula}}" placeholder="telefono...">
            </div>   
			<div class="form-group">
            	<label for="descripcion">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$recolector->telefono}}" placeholder="telefono...">
            </div>   
            	 <div class="form-group">
            			<label >Estatus</label>
            			<select name="activo" class="form-control">
            				
            				<option <?php if ($recolector->activo==0){ echo "selected"; } ?>value="0">Activo</option>
            				<option <?php if ($recolector->activo==1){ echo "selected"; } ?>value="1">Inactivo</option>
            				
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