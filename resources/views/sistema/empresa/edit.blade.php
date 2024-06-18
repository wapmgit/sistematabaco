@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<h3>Editar Empresa</h3>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
        <form action="{{route('updatempresa')}}" id="formcategoria" method="GET" enctype="multipart/form-data" >       
        {{csrf_field()}}

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control"  onchange="conMayusculas(this)"  value="{{$empresa->nombre}}" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
		   </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="descripcion">Rif</label>
            	<input type="text" name="rif" class="form-control" value="{{$empresa->rif}}" placeholder="Rif...">
            </div>
	          
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="descripcion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" value="{{$empresa->direccion}}" placeholder="Direccion...">
            </div>
	          
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="descripcion">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$empresa->telefono}}" placeholder="Telefono...">
            </div>
	          
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">	
            <div class="form-group">
				<button class="btn btn-danger btn-sm" id="btncancelar" type="reset">Cancelar</button>
            @if ($rol->idrol ==1)	<button class="btn btn-primary btn-sm" id="btnguardar" type="submit">Actualizar</button>
				@endif
				<div style="display: none" id="loading">  <img src="{{asset('img/sistema/loading30.gif')}}"></div>
            </div>	
		</div>
		</form>  
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
		$('#btncancelar').click(function(){   
			window.location="{{route('home')}}";
		})
       });
	    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}
</script>
@endpush