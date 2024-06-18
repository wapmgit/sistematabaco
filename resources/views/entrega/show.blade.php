@extends ('layouts.master')
@section ('contenido')
<?php  
$ceros=5;  $ltb=0; $ltbt=0;
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

              <!-- info row -->
              <div class="row invoice-info">
	    <div class="col-6">
				<strong>{{$empresa->nombre}}</strong>
                  <address>
                    <strong>{{$empresa->rif}}</strong><br>
						{{$empresa->direccion}}<br>
                     Tel: {{$empresa->telefono}}<br>
                  </address>
			</div>
                <!-- /.col -->
				<div class="col-3">

				  <h4 align="center">VENTA</h4>
              <h5 align="center"><?php echo "FAC".add_ceros($data-> identrega,$ceros); ?></h5>
				</div>
					<div class="col-3" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="50%" title="NKS">
				</div>
              </div>
		<div class="row">			
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<table width="100%"><tr>
					<td><label>Cedula/rif</label></td>
					<td><label>Cliente</label></td>
					<td><label>Telefono</label></td>
					</tr><tr>
					<td>{{$data->cedula}}</td>
					<td>{{$data->nombre}}</td>
					<td>{{$data->telefono}}</td>
					</tr>
					</table>

				</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<table width="100%" border="0">
					<thead style="background-color: #E6E6E6">
					<th>Codigo</th>
					<th>Articulo</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
					</thead>
					@foreach($detalle as $lab)
					 <tr> 
                          <td> {{$lab->codigo}}</td>
                          <td> {{$lab->nombre}}</td>
                          <td>{{$lab->cantidad}}</td>
                          <td>{{$lab->precio}}</td>
                          <td> {{$lab->valor}}</td>
                        </tr>
					  @endforeach
					  <tr><td colspan="5"><hr></td></tr>
					  <tr><td colspan="4" align="right"><strong> Total ->  </strong></td>
					  <td><strong><?php echo number_format( $data->totalventa, 2,',','.')." $"; ?></strong></td></tr>
					</table>
					
				</div>

				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
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
	window.location="{{route('entrega')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('entrega')}}";
		});

});
</script>

@endpush