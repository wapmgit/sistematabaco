@extends ('layouts.master')
@section ('contenido')
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
				<b>REPORTE CLIENTES</b>
                  <address>
                    <strong></strong><br>
					
                   <br>
                  </address>
			</div>
			</div>
              <!-- /.row -->
              <!-- Table row -->
            <div class="row">
				<div class="col-12 table-responsive">
					<table width="100%">
					<tr style="background-color: #E6E6E6">
					 <td><strong>Nombre</strong></td>	
					 <td><strong>Cedula/Rif</strong></td>	
					  <td><strong>Telefono</strong></td>	
					  <td align="center" ><strong>Direccion</strong></td>		
					  <td align="center" ><strong>Tobos</strong></td>		
					</tr>					
					<?php $count=0; $cntre=0; $cntpro=0; $acumt=0;?>
					@foreach ($rec as $q)
						<tr> <?php $count++; $acumt=$acumt+$q->tobos; ?> 
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->cedula}}</td>	
							<td>{{ $q->telefono}}</td>	
							<td align="center">{{ $q->direccion}}</td>	
							<td align="center">{{ $q->tobos}}</td>	
													
						</tr> 
					@endforeach
						<tr><td><strong>Total <?php echo $count; ?></strong></td>
							<td colspan="3"><strong></strong></td>
							<td align="center"><strong>Tobos <?php echo $acumt; ?></strong></td>
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
  window.location="{{route('report-clientes')}}";
    });

});
</script>
@endpush
@endsection