@extends ('layouts.master')
@section ('contenido')
<?php
$fserver=date('Y-m-d');
$fecha_a=$empresa->fechavence;
function dias_transcurridos($fecha_a,$fserver)
{
$dias = (strtotime($fecha_a)-strtotime($fserver))/86400;
//$dias = abs($dias); $dias = floor($dias);
return $dias;
}
$vencida=$cntvend=$cntcli=0;
if (dias_transcurridos($fecha_a,$fserver) < 0){
  $vencida=1;
  echo "<div class='alert alert-danger'>
      <H2>LICENCIA DE USO DE SOFTWARE VENCIDA!!!</H2> contacte su Tecnico de soporte.
      </div>";
};
$ceros=5;
$idv=0;

?>  
<div class="row">		
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	<h3>Registrar Produccion</h3>
	</div>
</div>		
<form action="{{route('saveproduccion')}}" id="formrecepcion" method="POST" enctype="multipart/form-data" >         
			{{csrf_field()}}
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
				<label>Cocedor</label> 
				<select name="cocedor" id="cocedor" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($cocedores as $r)
				<option value="{{$r -> idcocedor}}">{{$r -> nombre}}</option> 
				@endforeach
				</select>
					@if($errors->first('cocedor'))<P class='text-danger'>{{$errors->first('cocedor')}}</p>@endif
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
				<label>Fecha</label> 
				<input type="date" name="fecha" id="fecha" class="form-control" required value="{{$fserver}}"></input>
			</div>
		</div>		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="form-group">
				<label>Parrilla</label> 
				<select name="parri" id="parri" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($parrillas as $p)
				<option value="{{$p -> idparrilla}}_{{$p -> tren}}">{{$p -> nombre}}</option> 
				@endforeach
				</select>
			</div>        
		</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="form-group">
				<label>Turno</label> 
				<select name="turno" id="turno" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Esperando...</option>
				</select>
			</div>        
		</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="form-group">
            	<label for="descripcion">Kg Tren</label>
				<input tupe="number" name="kgtren" id="kgtren" readonly value="0" class="form-control" ></input>
            </div>         
		</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="form-group">
            	<label for="descripcion">Kg Subido</label>
				<input type="number" name="kgsubido" id="kgsubido"  required max="{{$art->stock}}"step="0.01" class="form-control" placeholder="{{$art->stock}}" ></input>
            </div>         
		</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <div class="form-group">
            	<label for="descripcion">Kg Cocina</label>
				<input type="number" name="kgcocina" id="kgcocina" readonly value="0" step="0.01" class="form-control" ></input>
            </div>         
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
				<input tupe="text" name="observacion" value="" class="form-control" placeholder="Observacion..." ></input>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar" align="right"></br>
            	    <div class="form-group">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden" ></input>
                        <button class="btn btn-primary btn-sm" type="button" id="btnguardar">Guardar</button>
            	       <button class="btn btn-danger btn-sm" type="reset" id="btncancelar">Cancelar</button>
					 <div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}">
					   </div>
                    </div>
		</div>

</div>

</form>	
 @push('scripts')
<script>
        $(document).ready(function(){

		$('#guardar').click(function(){
			cocedor=$("#cocedor").val();
			turno=$("#turno").val();
			parri=$("#parri").val();
			subido=$("#kgsubido").val();
			dato=document.getElementById('parri').value.split('_');
	var parrilla= dato[0];
			//alert(cocedor+' '+parrilla+''+turno+''+subido);
			 if (cocedor !="0" && parri != "0" && turno!="0" && subido != ""){	
		document.getElementById('loading').style.display=""; 
		document.getElementById('btnguardar').style.display="none"; 
		document.getElementById('btncancelar').style.display="none"; 
		document.getElementById('formrecepcion').submit(); 
			 }else{
				 alert('Verificar Cliente,Parrilla,Turno Y Kg Subidos..')
			 }
		});

		
       });
   $('#btncancelar').click(function(){	
	window.location="{{route('produccion')}}";
    })
	$("#kgsubido").on("change",function(){
		var kt=$("#kgtren").val();
		var ks=$("#kgsubido").val();
		tkg=parseFloat(kt)+parseFloat(ks);
		$("#kgcocina").val(tkg);
	});

		$("#parri").on("change",function(){
		$("#turno")
		.empty() 
		.selectpicker('refresh');
          var j=0;
         var form1= $('#formrecepcion');
        var url1 = '{{route("filtroturno")}}';
        var data1 = form1.serialize();
		$.post(url1,data1,function(result2){  
		var resultado2=result2;
          console.log(resultado2); 
       	parada2=result2.length;    
	$("#turno")
				.append('<option value="0" selected="selected">Seleccione..</option>');          
		for(j=0;j<=parada2;j++){
		$("#turno")
		.append( 
		'<option value="'+resultado2[j].idturno+'">'+resultado2[j].nombreturno+'</option>' )
		.selectpicker('refresh');
			}
			});
	dato=document.getElementById('parri').value.split('_');
	var tren= dato[1];
	$("#kgtren").val(tren);
	});


	function validarno(e){
		let tecla = (document.all) ? e.keyCode : e.which;
			if(tecla==13) { 
				event.preventDefault();
				} }	

</script>
@endpush
@endsection
