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
				<b>REPORTE DE COCEDORES</b>
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
					  <th>Nombre</th>
					  <th>Cedula</th>	
					  <th>Telefono</th>	
					</thead>					
					<?php $count=0; $cntre=0; $cntpro=0;?>
					@foreach ($rut as $q)
						<tr> <?php $count++; ?> 
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->cedula}}</td>	
							<td>{{ $q->telefono}}</td>							
						</tr> 
					@endforeach
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
  window.location="{{route('report-cocedor')}}";
    });

});
</script>
@endpush
@endsection