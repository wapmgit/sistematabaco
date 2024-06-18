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
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 	
		@include('reportes.ventas.venta.search')
		</div>
</div>
 <!-- Main content -->
	<div class="invoice p-3 mb-3">
              <!-- title row -->
		<div class="row">
    <h6> 
                    <small class="float-center">     NKS-Software</small>
                  </h6>
                <!-- /.col -->
		</div>
              <!-- info row -->
			<div class="row invoice-info">
			<div class="col-sm-2 invoice-col">			
                  <address>
					<img src="{{asset('dist/img/logo.png')}}"  width="170" height="100" alt="User Image">
                  </address>
			</div> 
			<div class="col-sm-6 invoice-col">
				<strong>{{$empresa->nombre}}</strong>
                  <address>
                    <strong>{{$empresa->rif}}</strong><br>
						{{$empresa->direccion}}<br>
                     Tel: {{$empresa->telefono}}<br>
                  </address>
			</div>
			<div class="col-sm-4 invoice-col">
				REPORTE DE VENTAS
                  <address>
                    <strong></strong><br>
					<?php echo date("d-m-Y",strtotime($searchText)); ?> al <?php echo date("d-m-Y",strtotime($searchText2)); ?> <br>
                   <br>
                  </address>
				</div>
              </div>
              <!-- /.row -->
              <!-- Table row -->
            <div class="row">
				<div class="col-12 table-responsive">
					<table width="100%">
						<thead style="background-color: #E6E6E6"><th colspan="7">Detalles de Ventas</th></thead>
					<thead >
					  <th>Fecha</th>
					  <th>Documento</th>
					  <th>Cliente</th>	
					  <th>Cedula</th>	
					  <th>Total</th>
						<th>Usuario</th>						  
					  <th>Estatus</th>	
					 
					</thead><?php $count=0;  $tlitros=0;   ?>
					@foreach ($datos as $q)
						<tr> <?php $count++;  if ($q->status==0){
							$tlitros=($tlitros+$q->totalventa);
						}?> 
							<td><?php echo date("d-m-Y",strtotime( $q->fecha)); ?></td>	
							<td><?php echo "FAC".add_ceros($q->identrega,$ceros); ?></td>	
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->cedula}}</td>	
							<td><?php 
							echo number_format( $q->totalventa,2,',','.'); ?></td>							
						<td>{{ $q->usuario}}</td>							
						<td> @if($q->status==1)Anulada @endif</td>							
						</tr> 
					@endforeach
						<tr><td><strong>Total Ventas: <?php echo $count; ?></strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong><?php echo number_format( $tlitros, 2,',','.'); ?></strong></td>
							<td></td>
						</tr>
					</table>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 		       
					<label>Usuario: </label>  {{ Auth::user()->name }}  
					<div class="form-group" align="center">
					<button type="button" id="imprimir" class="btn btn-primary btn-sm" data-dismiss="modal">Imprimir</button> 
					</div>
				</div>
				
			</div> 
			</div> 
	@push ('scripts')
<script>
$(document).ready(function(){
    $('#imprimir').click(function(){
  document.getElementById('imprimir').style.display="none";
  window.print(); 
  window.location="{{route('report-ventas')}}";
    });

});
</script>
@endpush
@endsection