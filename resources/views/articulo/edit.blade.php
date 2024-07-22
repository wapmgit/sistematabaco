@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{ $art->nombre}}</h3>
        <form action="{{route('updatearticulos')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >       
        {{csrf_field()}}
			<div class="form-group">
            	<label for="descripcion">Codigo</label>
            	<input type="text" name="codigo" value="{{$art->codigo}}" class="form-control">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
				   <input type="hidden" name="id" class="form-control" value="{{$art->idarticulo}}">
            	<input type="text" name="nombre" class="form-control"  onchange="conMayusculas(this)"  value="{{$art->nombre}}" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
		   </div>
           @if($rol->stock==1) <div class="form-group">
            	<label for="descripcion">Stock</label>
            	<input type="text" name="stock" class="form-control" value="{{$art->stock}}" readonly>
            </div>@endif
	                   <div class="form-group">
            	<label for="descripcion">Precio</label>
            	<input type="number" name="precio" class="form-control" value="{{$art->precio}}" step="0.001">
            </div>  
		<div class="form-group">
               	<label for="productor">¿ Disponible en Ventas ?</label></br>
				<input type="checkbox" name="venta"  <?php if ($art->venta==1) { echo "checked"; }?>>
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