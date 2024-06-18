@extends ('layouts.master')
@section ('contenido')
<?php  
$ceros=5;  
function add_ceros($numero,$ceros) {
  $numero=$numero;
	$digitos=strlen($numero);
  $recibo=" ";
  for ($i=0;$i<8-$digitos;$i++){
    $recibo=$recibo."0";
  }
return $insertar_ceros = $recibo.$numero;
};
?>
	
		  <!-- Main content -->
	<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
              <div class="col-12">
           <h6> 
                    <small class="float-center">     NKS-Software</small>
                  </h6>
                </div>
                </div>
                <!-- /.col -->
         
              <!-- info row -->
              <div class="row invoice-info">
			<div class="col-sm-6 invoice-col">
				<strong>{{$empresa->nombre}}</strong>
                  <address>
                    <strong>{{$empresa->rif}}</strong><br>
						{{$empresa->direccion}}<br>
                     Tel: {{$empresa->telefono}}<br>
                  </address>
			</div>
                <!-- /.col -->
				<div class="col-sm-3 invoice-col">

				  <h4 align="center">RECIBO DONACION</h4>
				   <h5 align="center"><?php echo add_ceros($datos-> iddonacion,$ceros); ?></h5>
					<h6 align="center"><?php echo date("d-m-Y",strtotime($datos->fecha)); ?></h6>
				</div>
					<div class="col-sm-3 invoice-col" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="80%" title="NKS">
				</div>
              </div>
		<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="form-group">
                      <label for="proveedor">Beneficiario</label>
                   <p>{{$datos->beneficiario}}</p>
                    </div>
            </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="form-group">
                      <label for="proveedor">Litros</label>
                   <p>{{$datos->litros}}</p>
                    </div>
            </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="form-group">
                      <label for="proveedor">Deposito</label>
                   <p>{{$dep}}</p>
                    </div>
            </div>
			           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="form-group">
                      <label for="proveedor">Tanque</label>
                   <p>{{$tanque}}</p>
                    </div>
            </div>
		</div>
        <div class ="row">
  
				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<label>Usuario: </label>  {{ $datos->usuario }}  
                    <div class="form-group" align="center"></br>
					 <button type="button" id="regresar" class="btn btn-danger btn-sm" data-dismiss="modal" title="Presione Alt+flecha izq. para regresar">Regresar</button>
                     <button type="button" id="imprimir" class="btn btn-primary btn-sm" data-dismiss="modal">Imprimir</button> 
                    </div>
                </div>                

       </div>
</div>	
@endsection
@push ('scripts')
<script>

$(document).ready(function(){
		$('#imprimir').click(function(){
	  document.getElementById('imprimir').style.display="none";
		document.getElementById('regresar').style.display="none";
	  window.print(); 
	window.location="{{route('deposito')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('deposito')}}";
		});

});

</script>

@endpush