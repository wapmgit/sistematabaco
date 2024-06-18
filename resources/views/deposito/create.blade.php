@extends ('layouts.master')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Deposito</h3>

        <form action="{{route('savedeposito')}}" id="formcategoria" method="POST" enctype="multipart/form-data" >         
        {{csrf_field()}}
            <div class="form-group">

            	<label for="nombre">Descripcion</label>				
            	<input type="text" name="descripcion" id="nombre" onchange="conMayusculas(this)"  class="form-control" placeholder="Descripcion...">
				@if($errors->first('descripcion'))<P class='text-danger'>{{$errors->first('descripcion')}}</p>@endif
			</div>
            <div class="form-group">
            	<label for="descripcion">Capacidad Lts</label>
            	<input type="number" name="capacidad" class="form-control" placeholder="Capacidad...">
				@if($errors->first('capacidad'))<P class='text-danger'>{{$errors->first('capacidad')}}</p>@endif
			</div>
            	 <div class="form-group">
            			<label >Cantidad Tanques</label>
            			<select name="tanques" id="tanques" class="form-control">
            				<option value="1">1</option>            		
            				<option value="2">2</option>            		
            				<option value="3">3</option>            		
            				<option value="4">4</option>            		
            			</select>
            			
            		</div>
	<div class="form-group">

       <table align="center"><tr><td><input type="number"  style="display: none" name="tnq[]" id="1" class="form-control" placeholder="Cap. tanque1"></td>
	   <td><input type="number" name="tnq[]" style="display: none" id="2" class="form-control" placeholder="Cap. tanque2"></td>
	   </tr>
	   <tr><td><input type="number" style="display: none" name="tnq[]" id="3" class="form-control" placeholder="Cap. tanque3"></td>
	   <td><input type="number" style="display: none" name="tnq[]" id="4" class="form-control" placeholder="Cap. tanque4"></td>
	   </tr></table>
           </div> 
         
		<div class="form-group">
             <label for="tipo_precio">Es Movil: </label></br>
        <label for="precio1"> Si </label> <input name="movil" type="radio" value="1" >
         <label for="precio2"> No </label> <input name="movil" type="radio" value="0" checked="checked">
           </div> 
         
		</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">	
            <div class="form-group">
				<button class="btn btn-danger btn-sm" id="btncancelar" type="reset">Cancelar</button>
            	<button class="btn btn-primary btn-sm" id="btnguardar" type="submit"  accesskey="l"><u>G</u>uardar</button>
				<div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}"></div>
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
		$("#tanques").on("change",function(){
//alert();
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