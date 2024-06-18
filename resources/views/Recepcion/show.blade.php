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

				  <h4 align="center">RECEPCION</h4>
              <h5 align="center"><?php echo add_ceros($data-> idrecoleccion,$ceros); ?></h5>
              <h6 align="center"><?php if($data->anulada==1){ echo "Anulada"; }?></h6>
				</div>
				    <div class="col-3" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="50%" title="NKS">
				</div>
              </div>
              </div>
		<div class="row">			
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<table width="100%"><tr>
					<td><label>Ruta</label></td>
					<td><label>Recolector</label></td>
					<td><label>Lts Lista/ Lts Tarima</label></td>
					<td><label>Diferencia</label></td>
					<td><label>Observacion</label></td>
					</tr><tr>
					<td>{{$data->ruta}}</td>
					<td>{{$data->recolector}}</td>
					<td>{{$data->litros}} / {{$data->litrostarima}}</td>
					<td>{{$data->litros-$data->litrostarima}}</td>
					<td>{{$data->observacion}}</td>
					</tr></table>

				</div>
		</div>
        <div class ="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table id="detalles" width="100%">
                      <thead style="background-color: #E6E6E6">
                     
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Litros Bufala</th>
                          <th>Litros Vaca</th>
                          <th>Subtotal</th>
              </thead><?php $acumcosto=0; $cont=0; $acumprecio=0; $acumb=$acumv=0; $monto=0;?>
                      <tbody>
                        @foreach($detalles as $det) <?php $cont++; ?>
                        <tr > <?php  
						$acumb=($acumb+$det->litrosbufala);
						$acumv=($acumv+$det->litrosvaca); ?>
                          <td>{{$det->codigo}}</td>
                          <td>{{$det->nombre}}</td>
                          <td>{{$det->litrosbufala}}</td>
                          <td>{{$det->litrosvaca}}</td>
                          <td>{{$det->litrosvaca+$det->litrosbufala}}</td>
                          
                        </tr>
                        @endforeach
                      </tbody>   
					  <tr style="background-color: #E6E6E6"><td colspan="2"><strong>Total: <?php echo $cont. " Items."; ?></strong></td>
					  <td><strong><?php echo number_format($acumb, 2,',','.');?> -> <?php echo number_format((($acumb*100)/$data->litros),2,'.',',')." %"; ?></strong></td>
					  <td><strong><?php echo number_format($acumv, 2,',','.');?> -> <?php echo number_format((($acumv*100)/$data->litros),2,'.',',')." %"; ?></strong></td>
					  <td><strong><?php echo number_format($data->litros, 2,',','.');?></strong></td></tr>
                  </table>
                 
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></br>
                  <table width="100%">
                      <thead style="background-color: #E6E6E6">
                     
                          <th colspan ="5">Resultados Laboratorio Tanque 1 <?php  if ($lab!=NULL){ echo" ->".$lab->temp." °C";  }?></th>
              </thead>
                      <tbody> <?php  if ($lab!=NULL){?><tr> 
                          <td align="center"><b>litros</b></br> {{$lab->ltst1}} Lts.</td>
                          <td align="center"><b>Alcohol</b> </br>{{$lab->alco}}</td>
                          <td align="center"><b>Peroxido</b></br> {{$lab->pero}}</td>
                          <td align="center"><b>Suero</b></br> {{$lab->suer}}</td>
                          <td align="center"><b>Sacaroza</b></br> {{$lab->saca}}</td>
                        </tr>
						<tr> 
                          <td align="center"><b>Acidez</b></br> {{$lab->acdz}}</td>
                          <td align="center"><b>Rexasurina</b></br> {{$lab->rexa}}</td>
                          <td align="center"><b>Grasa</b></br> {{$lab->gra}}</td>
                          <td align="center"><b>Deposito</b></br>  <small>{{$depouno->deposito}} </small></td>
                          <td align="center"><b>Tanque Almacen</b></br> {{$depouno->tanque}}</td>
                        </tr>
					  <?php } ?>
                      </tbody>   
                  </table>
                 
                    </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></br>
                  <table width="100%">
                      <thead style="background-color: #E6E6E6">
                     
                          <th colspan ="5">Resultados Laboratorio Tanque 2  <?php  if ($lab!=NULL){ echo" ->".$lab->temp2." °C";  }?></th>
              </thead>
                      <tbody>  <?php  if ($lab!=NULL){?><tr> 
                          <td align="center"><b>litros</b></br> {{$lab->ltst2}} Lts.</td>
                          <td align="center"><b>Alcohol</b> </br>{{$lab->alco2}}</td>
                          <td align="center"><b>Peroxido</b></br> {{$lab->pero2}}</td>
                          <td align="center"><b>Suero</b></br> {{$lab->suer2}}</td>
                          <td align="center"><b>Sacaroza</b></br> {{$lab->saca2}}</td>
                        </tr>
						<tr> 
                          <td align="center"><b>Acidez</b></br> {{$lab->acdz2}}</td>
                          <td align="center"><b>Rexasurina</b></br> {{$lab->rexa2}}</td>
                          <td align="center"><b>Grasa</b></br> {{$lab->gra2}}</td>
                          <td align="center"><b>Deposito</b></br> <small>{{$depodos->deposito}}</small></td>
                          <td align="center"><b>Tanque Almacen</b></br> {{$depodos->tanque}}</td>
                        </tr>
                        
                          <?php } ?>
                      </tbody>   
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
	window.location="{{route('recepcion')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('recepcion')}}";
		});

});
</script>

@endpush