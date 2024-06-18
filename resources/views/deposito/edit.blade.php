@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Deposito: {{ $dep->nombre}}</h3>
        <form action="{{route('updatedeposito')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >       
        {{csrf_field()}}

            <div class="form-group">
            	<label for="nombre">Nombre</label>
				   <input type="hidden" name="id" class="form-control" value="{{$dep->iddeposito}}">
            	<input type="text" name="nombre" class="form-control"  onchange="conMayusculas(this)"  value="{{$dep->nombre}}" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
		   </div>
            <div class="form-group">
            	<label for="descripcion">Encardgado</label>
            	<input type="text" name="encargado" class="form-control" value="{{$dep->encargado}}" placeholder="Encargado...">
            @if($errors->first('encargado'))<P class='text-danger'>{{$errors->first('encargado')}}</p>@endif
			</div>
			<div class="form-group">
			<label >Telefono</label>
			<input type="text" name="telefono" class="form-control" value="{{$dep->movil}}" placeholder="Telefono...">
            			
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
	$("#tanques").on("change",function(){
	$(".filaremove").remove();
  	for(k=1;k<=4;k++){
  document.getElementById(k).style.display="none";
		//	$("#"+k).val(0);
			$("#"+k).attr("placeholder","Cap. tanque"+k);
			}
	var id=$("#tanques").val();
  	for(j=1;j<=(id);j++){
  document.getElementById(j).style.display="";
			}

		});
       });
	    function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}
</script>
@endpush