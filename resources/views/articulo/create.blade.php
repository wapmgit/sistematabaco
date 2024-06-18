@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>

        <form action="{{route('savearticulos')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >         
        {{csrf_field()}}
			<div class="form-group">
            	<label for="descripcion">Codigo</label>
            	<input type="text" name="codigo" required  class="form-control">
				@if($errors->first('codigo'))<P class='text-danger'>{{$errors->first('codigo')}}</p>@endif
            </div>
            <div class="form-group">

            	<label for="nombre">Nombre</label>				
            	<input type="text" name="nombre" id="nombre" required onchange="conMayusculas(this)"  class="form-control" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
			</div>
            <div class="form-group">
            	<label for="descripcion">Stokc</label>
            	<input type="text" name="stock" class="form-control" value="0" readonly>
            </div>
			<div class="form-group">
            	<label for="descripcion">Precio</label>
            	<input type="text" name="precio" class="form-control" value="0" placeholder="Precio...">
					@if($errors->first('precio'))<P class='text-danger'>{{$errors->first('precio')}}</p>@endif
            </div>  
		<div class="form-group">
               	<label for="productor">¿ Disponible en Ventas ?</label></br>
				<input type="checkbox" name="venta" value="0">
		   </div>
		   </div> 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">	
            <div class="form-group">
				<button class="btn btn-danger btn-sm" id="btncancelar" type="reset">Cancelar</button>
            	<button class="btn btn-primary btn-sm" id="btnguardar" type="submit"  accesskey="l"><u>G</u>uardar</button>
			<div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}">
            </div>	
			</div> 
			</form>
	</div>
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