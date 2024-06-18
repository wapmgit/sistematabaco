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
$vencida=0;
if (dias_transcurridos($fecha_a,$fserver) < 0){
  $vencida=1;
  echo "<div class='alert alert-danger'>
      <H2>LICENCIA DE USO DE SOFTWARE VENCIDA!!!</H2> contacte su Tecnico de soporte.
      </div>";
};
$ceros=5;
function add_ceros($numero,$ceros) {
  $numero=$numero+1;
$digitos=strlen($numero);
  $recibo=" ";
  for ($i=0;$i<8-$digitos;$i++){
    $recibo=$recibo."0";
  }
return $insertar_ceros = $recibo.$numero;
};
?>@include('entrega.modalcliente')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<div class="small-box bg-blue">
				<div class="inner">
	<h3 align="center">Nueva Venta </h3>
		
	</div>
	</div>
	</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div class="small-box bg-dark">
				<div class="inner">
				<?php if($contador<>NULL){ $contador=$contador->identrega; }?>
	<h3 align="center"><?php echo "FAC".add_ceros($contador,$ceros); ?> </h3>
	</div>
	</div>
	</div>
	
</div>
	<form action="{{route('saveentrega')}}" method="POST" id="formajuste" enctype="multipart/form-data" >         
		{{csrf_field()}} 
	<div class="row">
	        
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
               	<label>Cliente</label><a href="" data-target="#modalcliente" data-toggle="modal"><span class="label label-success"> <i class="fa fa-fw  fa-user-plus"></i></span></a>
			<select name="cliente" id="picliente" class="form-control selectpicker" data-live-search="true">
			<option value="10000">Seleccione Cliente...</option> 
			@foreach ($clientes as $cli)
			<option value="{{$cli -> idcliente}}">{{$cli -> nombre}}</option> 
			@endforeach
			</select>
			</div>
		</div>
	</div>
	<div class ="row">                    
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
			<label>Cod - Articulo - existencia</label>
			<select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
			  <option value="0">Seleccione..</option>
			@foreach ($articulos as $articulo)
			<option value="{{$articulo -> idarticulo}} - {{$articulo -> precio}}">{{$articulo -> articulo}}</option> 
			@endforeach
			</select>
			<input type="hidden" id="ptipo" value="0">
			</div>
		</div>             
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="number" name="pcantidad" id="pcantidad" min="1" class ="form-control" placeholder="Cantidad">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="costo">Precio</label>
				<input type="number" name="pcosto" id="pcosto" class ="form-control" placeholder="Precio">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group"><label></label>	
			<button type="button" id="bt_add"  <?php if($vencida==1){?>style="display: none"<?php } ?> onmouseover="this.style.color='blue';" onmouseout="this.style.color='grey';"  class="form-control"><i class="fa fa-fw fa-plus-square"></i></button>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                      <thead style="background-color: #A9D0F5">
                          <th>Supr</th>
                          <th>Articulo</th>                     
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Subtotal</th>
                      </thead>
                      <tfoot> 
                      <th>Total</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th><h4 id="total">$.  0.00</h4><input type="hidden" name="totalo" id="totalo"></th>
                          </tfoot>
                      <tbody></tbody>
            </table>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar" align="right">
            	    <div class="form-group">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden" ></input>
                        <button class="btn btn-primary btn-sm" type="button" id="btnguardar">Procesar</button>
            	       <button class="btn btn-danger btn-sm" type="reset" id="btncancelar">Cancelar</button>
					 <div style="display: none" id="loading">  <img src="{{asset('dist/img/loading30.gif')}}">
					   </div>
                    </div>
		</div>
     </form>	
    </div>

       
@push ('scripts')
<script>
$("#pcantidad").change(validar);  
$(document).ready(function(){
		document.getElementById('pcosto').addEventListener('keypress',function(e){ validarenter(e); });
		document.getElementById('pcantidad').addEventListener('keypress',function(e){ validarno(e); });	
    $('#bt_add').click(function(){   
     agregar();
    });
	$("#pidarticulo").change(function(){
		document.getElementById('pcantidad').focus();
		datosarticulo=document.getElementById('pidarticulo').value.split('-');
        precio=datosarticulo[1];
		$("#pcosto").val(precio*1);
	})

 $('#btnguardar').click(function(){   
 $('#totalaj').val($('#totalo').val()); 
 if($("#picliente").val() == 10000 ){alert('Debe indicar Cliente.');}else{ 
		document.getElementById('loading').style.display=""; 
		document.getElementById('btnguardar').style.display="none"; 
		document.getElementById('btncancelar').style.display="none"; 
		document.getElementById('formajuste').submit(); }
    })

})
							function validarenter(e){
								let tecla = (document.all) ? e.keyCode : e.which;
								if(tecla==13) { 
							agregar();
							event.preventDefault();
								} }
								function validarno(e){
								let tecla = (document.all) ? e.keyCode : e.which;
								if(tecla==13) { 
								event.preventDefault();
								} }	
									
	$("#Cenviar").on("click",function(){ 
		document.getElementById('Cenviar').style.display="none";	
         var form1= $('#formulariocliente');
         var url1 = '{{route("almacenacliente")}}';
         var data1 = form1.serialize();
		vl=0;
		//alert();
		$.post(url1,data1,function(result){  
	    var resultado=result;
          console.log(resultado);	
        var id=resultado[0].idcliente;  
        var nombre=resultado[0].nombre;  	
			$("#picliente")
			.append( '<option value="'+id+'" selected >'+nombre+'</option>')
			.selectpicker('refresh');				
			$('select[name=cliente]').change();
			 alert('Cliente Registrado con exito');
			 $("#formulariocliente")[0].reset();
			
        });
    });
var cont=0;
var total=0;
subtotal=[];
$("#guardar").hide();

    function agregar(){
        total=$("#totalo").val();
        if (total>0){total=total*1;}if (total<0){total=total*1;}
		datosarticulo=document.getElementById('pidarticulo').value.split('-');
        idarticulo=datosarticulo[0];
        articulo= $("#pidarticulo option:selected").text();
        cantidad= $("#pcantidad").val();
        precio_compra=$("#pcosto").val();
       tipo= $("#ptipo").val();

        if (idarticulo !="0" && cantidad != "" && tipo!="" & precio_compra!=""){
            
            if (tipo=="Cargo"){
            subtotal[cont]=(cantidad*precio_compra);
                }else{
                  subtotal[cont]=(cantidad*precio_compra);
                }
                 
            total=(total)+(subtotal[cont]);
            
            var fila='<tr class="selected" id="fila'+cont+'"><td><button class="btn btn-warning btn-xs" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" readonly style="width: 80px" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]"  style="width: 80px" readonly value="'+precio_compra+'"></td><td>'+subtotal[cont].toFixed(2)+'</td></tr>';
            cont++;
            limpiar();
			auxtotal=(total*1).toFixed(2);
            $("#total").html("$ : " + auxtotal);
            $("#totalo").val(total); 
         	$("#pidarticulo").selectpicker('toggle');
            evaluar();
            $('#detalles').append(fila);
        }
        else{
            alert("Error al ingresar el articulo")
        }
    }
    function eliminar(index){
      total= $("#totalo").val();
        total=total-subtotal[index];
		auxtotal=(total*1).toFixed(2);
        $("#total").html("$" + auxtotal);
          $("#totalo").val(total);
        $("#fila" + index).remove();
        evaluar();

    }
    function limpiar(){
        $("#pcantidad").val("");
        $("#pprecio_compra").val("");
         $("#pcosto").val("");
      
    }

    function evaluar(){
        if(total =! 0){
            $("#guardar").show();
        }
        else
        {
            $("#guardar").hide();
        }
    }
    function validar(){  
      pcanti=$("#pcantidad").val();	 
      datosarticulo= $("#pidarticulo option:selected").text();
      arti=datosarticulo.split('-');
	  dato=document.getElementById('pidarticulo').value.split('-');
	  
      tipo= $("#ptipo").val();
      if (tipo=="Descargo"){
          st=arti[2];
        if (pcanti>parseFloat(st)){
          alert('cantidad supera al stock!! \n existencia:'+arti[2]);
          $("#pcantidad").val("");
          $("#pcosto").val("");
          $("#pcantidad").focus();
        } else {
            dato=document.getElementById('pidarticulo').value.split('-');
			 st1=dato[1];
             $("#pcosto").val(st1*1);
          }
      }if (tipo == "Cargo"){
         dato=document.getElementById('pidarticulo').value.split('-'); 
          st1=dato[1]; 
         $("#pcosto").val(st1*1);
        
        }
		if(pcanti==0){
		alert('Cantidad no puede ser 0');
		$("#pcantidad").val("");
         $("#pcantidad").focus();	 
		}

      }
</script>
@endpush
@endsection