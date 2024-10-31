@extends ('layouts.master')
@section ('contenido')
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 	
		@include('reportes.inventariofecha.search')
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
				<b>REPORTE DE INVENTARIO A UNA FECHA</b>
                  <address>
                    <strong></strong><br>
					<?php echo "Fecha: ".date("d-m-Y",strtotime($searchText)); ?> <br>
					<?php if(count($datos)>0){?>
					Deposito:<?php echo  $datos[0]->deposito; ?><br>
					Articulo:<?php echo  $datos[0]->articulo; ?>
                   <br>
					<?php } ?>
                  </address>
			</div>
			</div>
					
  
              <!-- /.row -->
              <!-- Table row -->
            <div class="row">
				<div class="col-12 table-responsive">
					<table width="100%">
						<thead style="background-color: #E6E6E6"><th colspan="12">Detalles de Movimiento</th></thead>
					<thead >
					  <th>Fecha</th>
					  <th>Tipo</th>
					  <th>Doc.</th>
					  <th>Entrada</th>	
					  <th>Salida</th>	
					  <th>Exis. Anterior</th>	
					  <th>Existencia</th>	
					  <th>Usuario</th>	
					</thead><?php $count=0; $acumco=0; $acumsub=0; $acumba=0; $acumj=0; $rendi=0; $tdeuda=0;$tbase=$texento=$tmiva=0; ?>
					@foreach ($datos as $q)
						<tr> <?php $count++; 
						?> 
							<td><?php echo date("d-m-Y",strtotime($q->fecha)); ?></td>	
							<td>{{ $q->tipo}}</td>	
							<td>{{ $q->iddoc}}</td>							
							<td><?php if( $q->cantidad > 0){ echo number_format( $q->cantidad,2,',','.');}?></td>	
							<td><?php if( $q->cantidad < 0){ echo number_format( $q->cantidad,2,',','.');}?></td>	
							<td><?php echo number_format( $q->exisant,2,',','.'); ?></td>	
							<td><?php echo number_format( ($q->cantidad+$q->exisant),2,',','.'); ?></td>			
							<td>{{$q->usuario}}</td>			
						</tr> 
					@endforeach
						<tr><td><strong>Total Items: <?php echo $count; ?></strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong></td>
				
						</tr>
					</table>
			
		
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
  window.location="{{route('report-produccion')}}";
    });

});
</script>
@endpush
@endsection