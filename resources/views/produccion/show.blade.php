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

				  <h4 align="center">PRODUCCION</h4>
              <h5 align="center"><?php echo add_ceros($datos-> idproceso,$ceros); ?></h5>
              <h6 align="center"></h6>
				</div>
				    <div class="col-3" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="50%" title="NKS">
				</div>
              </div>
              </div>
		<div class="row">			
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<table width="100%"><tr>
					<td><label>Cocedor</label>:{{$datos->cocedor}}</td>
					<td><label>Cedula</label>:{{$datos->cedula}}</td>
					<td><label>Fecha</label>:{{$datos->fecha}}</td>
					</tr></table>
				</div>
		</div>
        <div class ="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				   <div class="table-responsive">
                  <table id="detalles" width="100%">
                      <thead style="background-color: #E6E6E6">
                          <th>Parrilla</th>
                          <th>Turno</th>
                          <th>Kg Subido</th>
                          <th>Kg Cocina</th>
                          <th>Kg Bajado</th>
                          <th>Kg Jalea</th>
                          <th>Cnt. Tobos</th>
                          <th>Kg Tren</th>
                          <th>Rendimiento</th>
              </thead>
                      <tbody>
                        <tr > 
                          <td>{{$datos->parrilla}}</td>
                          <td>{{$datos->turno}}</td>
                          <td>{{$datos->kgsubido}}</td>
                          <td>{{$datos->kgcocina}}</td>
                          <td>{{$datos->kgbajado}}</td>
                          <td>{{$datos->kgjalea}}</td>
                          <td>{{number_format($datos->kgjalea/24,2,',','.')}}</td>
                          <td>{{$datos->kgtren}}</td>
                          <td>{{$datos->rendimiento}}</td>                          
                        </tr>
          
                      </tbody> 
						<tr><td colspan="3"><strong>Fecha Cierre:</strong> {{$datos->fechacierre}}</td>
						<td colspan="2"><strong>Supervisor:</strong> {{$supervisor->name}}</td>
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
	window.location="{{route('produccion')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('produccion')}}";
		});

});
</script>

@endpush