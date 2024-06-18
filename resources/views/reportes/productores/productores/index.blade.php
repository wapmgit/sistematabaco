@extends ('layouts.master')
@section ('contenido')
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 	
		@include('reportes.productores.productores.search')
		</div>
</div>
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
				<b>REPORTE PRODUCTORES</b>
                  <address>
                    <strong></strong><br>
							<?php if ($searchText=="") { echo "Todas las rutas"; } ?> <br>
                   <br>
                  </address>
			</div>
			</div>
			

              <!-- /.row -->
              <!-- Table row -->
            <div class="row">
				<div class="col-12 table-responsive">
					<table width="90%" align="center">
						<thead style="background-color: #E6E6E6"><th colspan="5">Resumen Rutas</th></thead>
					<thead >
					  <th>Codigo</th>
					  <th>Nombre</th>	
					  <th>Telefono</th>	
					  <th>Tipo</th>	
					  <th>Ruta</th>	
					</thead><?php $count=0;  $cntv=0; $cntb=0; $cnta=0;?>
					@foreach ($pro as $q)
						<tr> <?php $count++; ?> 
							<td>{{ $q->codigo}}</td>	
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->telefono}}</td>						
							<td>
					<?php 
					if($q->tipo==1){  $cntv++; echo "Vaca"; } 
					if($q->tipo==2){ $cntb++; echo "Bufala"; } 
					if($q->tipo==3){ $cnta++; echo "Ambos"; } 					
					?> 
					</td>						
							<td>{{ $q->ruta}} -> {{ $q->cel}}</td>						
						</tr> 
					@endforeach
						<tr><td><strong>Total:  <?php echo $count; ?></strong></td>
							<td><strong>Vaca : <?php echo $cntv; ?></strong></td>
							<td><strong>Bufala: <?php echo $cntb; ?></strong></td>
							<td><strong>Ambos: <?php echo $cnta; ?></strong></td>
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
  window.location="{{route('recepciones')}}";
    });

});
</script>
@endpush
@endsection