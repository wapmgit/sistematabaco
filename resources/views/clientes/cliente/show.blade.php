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
                <div class="col-6">
           <h6> 
                    <small class="float-center">     NKS-Software</small>
                  </h6>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row --> <div class="row">
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

				  <h4 align="center">Movimientos de Envases</h4>
              <h5 align="center"></h5>
				</div>
				    <div class="col-3" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="50%" title="NKS">
				</div>
              </div>
              </div>
		<div class="row">			
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<table width="100%"><tr>
					<td><label>Cliente</label>:{{$cliente->nombre}}</td>
					<td><label>Cedula</label>:{{$cliente->cedula}}</td>
					<td><label>telefono</label>:{{$cliente->telefono}}</td>
					</tr></table>
				</div>
		</div>
        <div class ="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				   <div class="table-responsive">
                  <table id="detalles" width="100%">
                      <thead style="background-color: #E6E6E6">
                          <th>Movimiento</th>
                          <th>Fecha</th>
                          <th>Tipo</th>
                          <th>Deposito</th>
                          <th>Cantidad</th>
                          <th>Observacion</th>
                          <th>Usuario</th>
              </thead>
                      <tbody><?php $in=0; $out=0; ?>
					  @foreach ($data as $q)
                        <tr > 
                          <td><?php  echo add_ceros($q-> id,$ceros); ?></td>
                          <td>{{$q->fecha}}</td>
                          <td><?php if($q->tipo==1){$in=$in+$q->cantidad; echo "Entrada";}
						  else{ $out=$out+$q->cantidad; echo "Salida";}?></td>
                          <td>{{$q->nombre}}</td>
                          <td>{{$q->cantidad}}</td>
                          <td>{{$q->observacion}}</td>
                          <td>{{$q->usuario}}</td>                         
                        </tr>
				@endforeach
                      </tbody> 
						<tr><td colspan="2"><strong>Entradas: <?Php echo $in; ?></strong></td>
						<td colspan="2"><strong>Salidas: <?Php echo $out; ?></strong></td>
						<td colspan="2"><strong>Total: <?Php echo $out-$in; ?></strong></td>
						</tr>
                  </table>
                 
                    </div>
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
	window.location="{{route('clientes')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('clientes')}}";
		});

});
</script>

@endpush