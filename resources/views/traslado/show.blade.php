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
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
				<div class="col-sm-6 invoice-col">
				{{$empresa->nombre}}
                  <address>
                    <strong>{{$empresa->rif}}</strong><br>
                   {{$empresa->direccion}}<br>
                     Tel: {{$empresa->telefono}}<br>
                  </address>
				</div>
                <!-- /.col -->
				<div class="col-sm-3 invoice-col">

				  <h4 align="center">Traslado Interno</h4>
				   <h5 align="center"><?php echo add_ceros($datos-> idtraslado,$ceros); ?></h5>
              
				</div>
					<div class="col-sm-3 invoice-col" align="center">
					<img src="{{asset('dist/img/logo.png')}}"  width="70%" height="70%" alt="User Image">
				</div>
              </div>
		<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Deposito Origen</label>
                   <p>{{$datos->deporigen}}</p>
                    </div>
            </div>
            
		  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Deposito Destino</label>
                   <p>{{$datos->depdestino}}</p>
                    </div>
            </div>
			
	  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Concepto</label>
                   <p>{{$datos->concepto}}</p>
                    </div>
            </div>  
			  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Fecha</label>
                   <p><?php echo date("d-m-Y",strtotime($datos->fecha)); ?> </p>
                    </div>
            </div>  		
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                      <thead style="background-color: #A9D0F5">
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>Costo</th>
                          <th>Subtotal</th>
                      </thead>
                      <tfoot> 
                      <tbody>
					@foreach ($detalles as $cat)
				<tr>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->cantidad}}</td>
					<td>{{ $cat->precio}}</td>
					<td>{{ $cat->precio*$cat->cantidad}}</td>
				</tr>			
				@endforeach
					  </tbody>
                  </table>
                    </div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 		       
					<label>Responsable: </label> {{$datos->usuario}} 
					<div class="form-group" align="center"> <button type="button" id="regresar" class="btn btn-danger btn-sm" data-dismiss="modal" title="Presione Alt+flecha izq. para regresar">Regresar</button>
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
	window.location="{{route('traslado')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('traslado')}}";
		});

});

</script>

@endpush