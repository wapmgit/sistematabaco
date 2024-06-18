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
				<b>INVENTARIO</b>
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
					<table width="100%" BORDER="1">
					  <th>Codigo</th>
					  <th>Articulo</th>
						<th>Stock</th>	
					  <th>Precio</th>					  
					  <th>Valor</th>	
						
					</thead>					
					<?php $count=0; $cntuso=0; $cntcap=0;?>
					@foreach ($uso as $q)
						<tr> <?php $count++; $cntcap=($cntcap+($q->precio*$q->stock)); $cntuso=$cntuso+$q->stock; ?> 
							<td>{{ $q->codigo}}</td>	
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->stock}}</td>	
							<td>{{ $q->precio}}</td>
						<td>{{ $q->precio*$q->stock}}</td>							
						</tr> 
					@endforeach
						<tr><td><strong>Total Items <?php echo $count; ?></strong></td>
							<td><strong></strong></td>
					
							<td ><strong><?php echo  $cntuso; ?></strong></td>
							<td><strong></strong></td>
							<td ><strong><?php echo $cntcap; ?></strong></td>		
							
						</tr>
					</table></br>
				</div>
					<div class="col-12 table-responsive">
					<table width="100%" BORDER="1">
						@foreach ($deposito as $d)
						<tr><td colspan="5" align="center"><strong>ALMACEN {{$d->nombre}}</strong></td></tr>
					  <th>Codigo</th>
					  <th>Articulo</th>
						<th>Stock</th>	
					  <th>Precio</th>					  
					  <th>Valor</th>	
						
					</thead>					
					<?php $count=0; $cntuso=0; $cntcap=0;?>
				
						@foreach ($inv as $q)
							<?php if($d->iddeposito==$q->idalmacen) {?>
					
						<tr> <?php $count++; $cntcap=($cntcap+($q->precio*$q->existencia)); $cntuso=$cntuso+$q->existencia; ?> 
							<td>{{ $q->codigo}}</td>	
							<td>{{ $q->nombre}}</td>	
							<td>{{ $q->existencia}}</td>	
							<td>{{ $q->precio}}</td>
						<td>{{ $q->precio*$q->existencia}}</td>							
						</tr> 
				
							<?php } ?>	
							@endforeach
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
  window.location="{{route('report-inventario')}}";
    });

});
</script>
@endpush
@endsection