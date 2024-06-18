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
	<h3>Registrar Recepcion</h3>
	</div>
</div>		
<form action="{{route('saverecepcion')}}" id="formrecepcion" method="POST" enctype="multipart/form-data" >         
			{{csrf_field()}}
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<div class="form-group">
				<label>Ruta</label> 
				<select name="ruta" id="jruta" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($rutas as $r)
				<option value="{{$r -> idruta}}">{{$r -> nombre}}</option> 
				@endforeach
				</select>
			</div>
		</div>		
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <div class="form-group">
            	<label for="descripcion">Recolector</label>
				<select name="precolector" id="jrecolector" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Seleccione...</option>
				</select>
				<input type="hidden" name="recolector" id="recolector">
            </div>         
		</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="form-group">
            	<label for="descripcion">Litros Lista</label>
				<input tupe="number" name="litro" id="litro" readonly value="0" class="form-control" ></input>
            </div>         
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
				<input tupe="text" name="observacion" value="" class="form-control" placeholder="Observacion..." ></input>
		</div>

</div>
<div class ="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			 <label>Productor </label></br>
			 <select name="productor" id="jproductor" class="form-control selectpicker" data-live-search="true" >
			  <option value="5000" selected="selected">Seleccione..</option>
			  </select>
		</div>
	</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Litros Bufala</label>
                        <input type="number" name="pcantidadb" class="form-control"  id="pcantidadb" min="0"  value="0">
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Litros Vaca</label>
                        <input type="number" name="pcantidadv" class="form-control" id="pcantidadv" min="0"  value="0">
                        <input type="hidden" name="plb" class="form-control" id="plb" value="0">
                    </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
						<label>&nbsp;</label>		
					 	<button type="button" onmouseover="this.style.color='blue';" onmouseout="this.style.color='grey';"  id="bt_add" class="form-control"  > <i tabindex="1" class="fa fa-fw fa-plus-square"></i> </button>

					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
					  <table id="detalles" width="100%">
						  <thead style="background-color: #A9D0F5">
							  <th>Supr</th>
							  <th>Cod. Productor</th>
							  <th>Ltrs Bufala</th>
							  <th>Ltrs Vaca</th>
							  <th>SubTotal</th>
							
						  </thead>	
						  <tbody></tbody>
						  <tfoot style="background-color: #A9D0F5"> 
						  <th>Total</th>
							  <th></th>
							  <th></th>
							  <th></th>
							  <th><h4 id="total">Lts.  0.00</h4><input type="hidden" name="total_litros" id="total_litros"></th>							 
							  </tfoot>					
					
						</table>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="botones"  align="right">
				  <div class="form-group"></br>
						<?php if ($vencida==0){ ?><button class="btn btn-primary" style="display: none" id="guardar" type="submit" accesskey="l"><u>R</u>egistrar</button><?php } ?>
						<button class="btn btn-danger" type="button"  id="btncancelar">Cancelar</button>
						<div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}"></div>
					</div>
				</div>
</div> 
</form>	
 @push('scripts')
<script>
        $(document).ready(function(){

			document.getElementById('pcantidadb').addEventListener('keypress',function(e){ validarno(e); });	
			document.getElementById('pcantidadv').addEventListener('keypress',function(e){ validarno(e); });	
			$('#guardar').click(function(){   
		document.getElementById('loading').style.display=""; 
		document.getElementById('guardar').style.display="none"; 
		document.getElementById('btncancelar').style.display="none"; 
		document.getElementById('formrecepcion').submit(); 
		});
		$("#bt_add").on("click",function(){
		agregar();
		}); 
		
       });
   $('#btncancelar').click(function(){	
	window.location="{{route('newrecepcion')}}";
    })

	$("#jruta").on("change",function(){
		var idr=$("#jruta").val();
		$("#jrecolector")
		.empty() 
		.selectpicker('refresh');
          var j=0;
         var form= $('#formrecepcion');
        var url = '{{route("filtrorecolector")}}';
        var data = form.serialize();
		$.post(url,data,function(result1){  
		var resultado1=result1;
          console.log(resultado1); 
         // parada1=10;    
	parada1=result1.length;		  
	$("#jrecolector")
				.append('<option value="1000" selected="selected">Seleccione..</option>');		  
		for(j=0;j<=parada1;j++){
		$("#jrecolector")
		.append( 
		'<option value="'+resultado1[j].idrecolector+'">'+resultado1[j].nombre+'</option>' )
		.selectpicker('refresh');
			}
			});
	});
		$("#jproductor").on("change",function(){
			$("#pcantidadb").val("");
			$("#pcantidadb").focus();
		});
		$("#jrecolector").on("change",function(){
			$("#recolector").val($("#jrecolector").val());
		$("#jproductor")
		.empty() 
		.selectpicker('refresh');
          var j=0;
         var form1= $('#formrecepcion');
        var url1 = '{{route("filtroproductor")}}';
        var data1 = form1.serialize();
		$.post(url1,data1,function(result2){  
		var resultado2=result2;
          console.log(resultado2); 
       	parada2=result2.length;    
	$("#jproductor")
				.append('<option value="1000" selected="selected">Seleccione..</option>');          
		for(j=0;j<=parada2;j++){
		$("#jproductor")
		.append( 
		'<option value="'+resultado2[j].idproductor+'">'+resultado2[j].codigo+'</option>' )
		.selectpicker('refresh');
			}
			});
	});
	var cont=0;
	var total=0;
	subtotal=[];
	acumplb=[];

	function agregar(){
		pb=$("#plb").val();
        cantb= $("#pcantidadb").val();
        cantv= $("#pcantidadv").val();
        product=$("#jproductor").val();
		codproduct= $("#jproductor option:selected").text();			
        if (cantb != "" && cantv != ""){
				acumplb[cont]=parseFloat(cantb);
                subtotal[cont]=(parseFloat(cantb)+parseFloat(cantv));
                total=parseFloat(total)+parseFloat(subtotal[cont].toFixed(2));
              var fila='<tr class="selected" id="fila'+cont+'" ><td><button class="btn btn-warning btn-xs"  onclick="eliminar('+cont+');">X</button></td><td><input  type="hidden" name="pproductor[]" value="'+product+'">'+codproduct+'</td><td><input type="number" name="pcantb[]" readonly="true" style="width: 60px" value="'+cantb+'"></td><td><input type="number"  name="pcantv[]" readonly="true" style="width: 80px" value="'+cantv+'"></td><td>'+subtotal[cont].toFixed(2)+'</td></tr>';
              cont++; 
              limpiar();
              $("#total").html(" Lts  : " + total.toFixed(2));			  
              $("#total_litros").val(total);
              $("#litro").val(total);
              $("#plb").val(parseFloat(cantb)+parseFloat(pb));
              $('#detalles').append(fila);
			  $("#jproductor").selectpicker('toggle');
			  document.getElementById('guardar').style.display="";
		  }
             else
              {
              alert("Verificar datos");
			  $("#pcantidadb").val(0);
			  $("#pcantidadv").val(0);
              }
    }
	function eliminar(index){
		pb=$("#plb").val();
        total=(total-subtotal[index]).toFixed(2);
		tlb= acumplb[index];
        $("#total").html(total);
		 $("#litro").val(total);
		 $("#plb").val(parseFloat(pb)-parseFloat(tlb));
		 if(total ==0){
			   document.getElementById('guardar').style.display="none";
		 }
        $("#fila" + index).remove();
    }
	function limpiar(){
		$("#pcantidadb").val(0);
		$("#pcantidadv").val(0);
    }
	function validarno(e){
		let tecla = (document.all) ? e.keyCode : e.which;
			if(tecla==13) { 
				event.preventDefault();
				} }	

</script>
@endpush
@endsection
