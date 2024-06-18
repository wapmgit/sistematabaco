@extends ('layouts.master')
@section ('contenido')
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 	
		@include('reportes.produccion.search')
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
				<b>REPORTE DE PRODUCCION</b>
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
						<thead style="background-color: #E6E6E6"><th colspan="12">Detalles de Produccion</th></thead>
					<thead >
					  <th>Documento</th>
					  <th>Cocedor</th>
					  <th>Fecha</th>
					  <th>Parrilla</th>	
					  <th>Turno</th>	
					  <th>Kg subido</th>	
					  <th>Kg Cocina</th>	
					  <th>Kg Bajado</th>	
					  <th>Kg Jalea</th>	
					  <th>Kg Tren</th>	
					  <th>% Rend.</th>	
					  <th>Usuario</th>	
					</thead><?php $count=0; $acumco=0; $acumsub=0; $acumba=0; $acumj=0; $rendi=0; $tdeuda=0;$tbase=$texento=$tmiva=0; ?>
					@foreach ($datos as $q)
						<tr> <?php $count++; 
						$acumco=$acumco+$q->kgcocina;
						$acumsub=$acumsub+$q->kgsubido;
						$acumba=$acumba+$q->kgbajado;
						$acumj=$acumj+$q->kgjalea;
						$rendi=$rendi+$q->rendimiento;
						?> 
							<td>{{ $q->idproceso}}</td>	
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->fecha}}</td>							
							<td>{{ $q->parrilla}}</td>	
							<td>{{ $q->nombreturno}}</td>	
							<td><?php echo number_format( $q->kgsubido,2,',','.'); ?></td>
							<td><?php echo number_format( $q->kgcocina,2,',','.'); ?></td>
							<td><?php echo number_format( ($q->kgbajado),2,',','.'); ?></td>		
							<td><?php echo number_format( ($q->kgjalea),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->kgtren),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->rendimiento),2,',','.'); ?></td>			
							<td>{{$q->usuario}}</td>			
						</tr> 
					@endforeach
						<tr><td><strong>Total Items: <?php echo $count; ?></strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong></td>
							<td><strong><?php echo number_format( $acumsub, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( $acumco, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($acumba), 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($acumj), 2,',','.'); ?></strong></td>
							<td><?PHP if($count==0){$count=1;}?></td>
							<td><strong><?php echo number_format( (($rendi/$count)), 2,',','.')." %"; ?></strong></td>
				
							<td></td>
						</tr>
					</table>
				<div class="col-12 table-responsive">
					<table width="100%">
						<thead style="background-color: #E6E6E6"><th colspan="7">Produccion por Parrilla</th></thead>
					<thead >
					  <th>Parrilla</th>
					  <th>Kg subido</th>	
					  <th>Kg Cocina</th>	
					  <th>Kg Bajado</th>	
					  <th>Kg Jalea</th>	
					  <th>Kg Tren</th>	
					  <th>% Rend.</th>	
					</thead><?php $cnt=0;$kgco=0; $sub=0; $ba=0; $acj=0; $re=0; ?>
					@foreach ($datosparrilla as $q)
						<tr> <?php $cnt++;
						$kgco=$kgco+$q->kgc;
						$sub=$sub+$q->kgs;
						$ba=$ba+$q->kgb;
						$acj=$acj+$q->kgj;
						$re=$re+$q->rendi;
						?> 
							<td>{{ $q->parrilla}}</td>		
							<td><?php echo number_format( $q->kgs,2,',','.'); ?></td>
							<td><?php echo number_format( $q->kgc,2,',','.'); ?></td>
							<td><?php echo number_format( ($q->kgb),2,',','.'); ?></td>		
							<td><?php echo number_format( ($q->kgj),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->kgt),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->rendi),2,',','.'); ?></td>					
						</tr> 
					@endforeach
						<tr><td></td>
							<td><strong><?php echo number_format( $sub, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( $kgco, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($ba), 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($acj), 2,',','.'); ?></strong></td>
							<td></td>
							<td></td>
				
							<td></td>
						</tr>
					</table>
				</div>
				<div class="col-12 table-responsive">
					<table width="100%">
						<thead style="background-color: #E6E6E6"><th colspan="7">Produccion por Turno</th></thead>
					<thead >
					  <th>Turno</th>
					  <th>Kg subido</th>	
					  <th>Kg Cocina</th>	
					  <th>Kg Bajado</th>	
					  <th>Kg Jalea</th>	
					  <th>Kg Tren</th>	
					  <th>% Rend.</th>	
					</thead><?php $cnt=0;$kgco=0; $sub=0; $ba=0; $acj=0; $re=0; ?>
					@foreach ($datosturno as $q)
						<tr> <?php $cnt++;
						$kgco=$kgco+$q->kgc;
						$sub=$sub+$q->kgs;
						$ba=$ba+$q->kgb;
						$acj=$acj+$q->kgj;
						$re=$re+$q->rendi;
						?> 
							<td>{{ $q->nombreturno}}</td>		
							<td><?php echo number_format( $q->kgs,2,',','.'); ?></td>
							<td><?php echo number_format( $q->kgc,2,',','.'); ?></td>
							<td><?php echo number_format( ($q->kgb),2,',','.'); ?></td>		
							<td><?php echo number_format( ($q->kgj),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->kgt),2,',','.'); ?></td>			
							<td><?php echo number_format( ($q->rendi),2,',','.'); ?></td>					
						</tr> 
					@endforeach
						<tr><td></td>
							<td><strong><?php echo number_format( $sub, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( $kgco, 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($ba), 2,',','.'); ?></strong></td>
							<td><strong><?php echo number_format( ($acj), 2,',','.'); ?></strong></td>
							<td></td>
							<td></td>
				
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
  window.location="{{route('report-produccion')}}";
    });

});
</script>
@endpush
@endsection