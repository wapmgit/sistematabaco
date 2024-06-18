@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<h3>Nuevo Cliente</h3> 
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">			
			<form action="{{route('savecliente')}}" id="formulario" method="POST" enctype="multipart/form-data" >         
			{{csrf_field()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" onchange="conMayusculas(this)" placeholder="Nombre...">
				@if($errors->first('nombre'))<P class='text-danger'>{{$errors->first('nombre')}}</p>@endif
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">			
            <div class="form-group">
            	<label for="descripcion">Cedula</label>
            	<input type="text" name="cedula" id="vidcedula" onchange="conMayusculas(this)"  value="{{old('cedula')}}" class="form-control" maxlength="10" placeholder="V000000">
					@if($errors->first('cedula'))<P class='text-danger'>{{$errors->first('cedula')}}</p>@endif
            </div>
		</div>	

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">			
            <div class="form-group">
            	<label for="descripcion">Telefono</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
            </div>
		</div>
		<div class="col-lg-21 col-md-12 col-sm-12 col-xs-12">			
             <div class="form-group">
             <label for="direccion">Direccion</label>
            <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Direccion...">
           </div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">	
            <div class="form-group">
				<button class="btn btn-danger btn-sm" type="reset" id="btncancelar">Cancelar</button>
            	<button class="btn btn-primary btn-sm"  type="button" id="btnguardar">Guardar</button>
			    <div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}"></div>
            </div>	
</div>			
		</form>       
	</div>
@endsection
@push('scripts')
	<script>
	    $('[data-mask]').inputmask()
		$(document).ready(function(){
			$("#diascre").attr("readonly",true); 
		$("#vidcedula").on("change",function(){
         var form2= $('#formulario');
        var url2 = '{{route("validarcliente")}}';
        var data2 = form2.serialize();
			$.post(url2,data2,function(result2){  
		var resultado2=result2;
         console.log(resultado2); 
         rows=resultado2.length; 
			if (rows > 0){
		var Toast = Swal.mixin({
		toast: true,
		position: 'top-center',
		showConfirmButton: true,
		timer: 4000
		});
            var nombre=resultado2[0].nombre;
			var cedula=resultado2[0].cedula;    
		Toast.fire({
        icon: 'info',
        title: 'Cedula ya existe, Nombre: '+nombre+' Cedula: '+cedula
		});
           $("#vidcedula").val("");
           $("#vidcedula").focus();
			}    
          });
     });

	  $('#btnguardar').click(function(){   
		document.getElementById('loading').style.display=""; 
		document.getElementById('btnguardar').style.display="none"; 
		document.getElementById('btncancelar').style.display="none"; 
		document.getElementById('formulario').submit(); 
    })

			 });
			 function conMayusculas(field) {
            field.value = field.value.toUpperCase()
}

	</script>
			@endpush