@extends ('layouts.master')
@section ('contenido')
<?php 		$longitud = count($pacientes);
			$array = array();
			foreach($pacientes as $t){
			$arrayidcliente[] = $t->id_cliente;
			}
			$longitudn = count($notasnd);
			$arrayn = array();
			foreach($notasnd as $n){
			$arraynidcliente[] = $n->id_cliente;
			} 			
			for ($i=0;$i<$longitud;$i++){
				for($j=0;$j<$longitudn;$j++){
				if ($arrayidcliente[$i]==$arraynidcliente[$j]){
					$arraynidcliente[$j]=0;
				};
				}
			}			
			?>
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Cuentas por Cobrar </h3>
		@include('clientes.cobrar.search')
	</div>
	</div>
 
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>				
					<th>Nombre</th>
					<th>Cedula</th>
					<th>Telefono</th>
					<th>Vendedor</th>
					<th>Monto</th>
					<th>N/D</th>
					<th>N/C</th>
					<th>Saldo</th>
					<th>Opciones</th>
				</thead>
				<?php $total=$nd=$nc=0; $acdumt=0; $acumnd=$acumnc=0; ?>
				<tbody>
               @foreach ($pacientes as $cat)
				<tr>
				<?php $nd=$nc=0;?>
					<td><small>{{ $cat->nombre}}</small></td>
					<td><small>{{ $cat->cedula}}</small></td>
					<td><small>{{ $cat->telefono}}</small></td>
					<td><small>{{ $cat->vendedor}}</small></td>
					<td>
					 @foreach ($notas as $not) <?php if($cat->id_cliente==$not->id_cliente){ 
					 if($not->tipo==1){$acumnd=$acumnd+$not->tnotas; $nd=$not->tnotas;}if($not->tipo==2){ $acumnc=$acumnc+$not->tnotas; $nc=$not->tnotas;} }?>
					 @endforeach				
					<?php $total=$total+$cat->acumulado; echo number_format( $cat->tventa, 2,',','.')." $";?></td>
					<td><?php echo number_format( $nd, 2,',','.')." $";?></td>
					<td><?php echo number_format( $nc, 2,',','.')." $";?></td>
					<td><?php echo number_format((($cat->acumulado+$nd)-$nc), 2,',','.')." $";?></td>
					<td>
					@if($rol->abonarcxc==1)<a href="{{route('showcxc',['id'=>$cat->id_cliente])}}"><button class="btn btn-info btn-xs">Abono</button></a>@endif
					@if($rol->crearventa==1)<a href="{{route('facventa',['id'=>$cat->id_cliente])}}"><button class="btn btn-primary btn-xs">Facturar</button></a>@endif						
					</td>
				</tr>
				@endforeach
				 @foreach ($notasnd as $not)
				 	<?php for ($i=0;$i<$longitudn;$i++){
						if ($not->id_cliente==$arraynidcliente[$i]){?>
				<tr>
					<td><small>{{$not->nombre}}</small></td>
					<td><small>{{$not->cedula}}</small></td>
					<td><small>{{$not->telefono}}</small></td>
					<td></td>
					<td>			
					</td>
					<td><?php $acumnd=$acumnd+$not->tnotas; echo number_format( $not->mnotas, 2,',','.')." $";?></td>
					<td>
					@foreach ($notas as $no) 
					
					<?php if($no->id_cliente==$arraynidcliente[$i]){ 
					if($no->tipo==2){ $acumnc=$acumnc+$no->tnotas; $nc=$no->tnotas;} }
					?>
					 @endforeach
					<?php echo number_format(($nc), 2,',','.')." $";?>
					</td>
					<td><?php echo number_format(($not->tnotas-$nc), 2,',','.')." $";?></td>
					<td>
				@if($rol->abonarcxc==1)<a href="{{route('showcxc',['id'=>$not->id_cliente])}}"><button class="btn btn-info btn-xs">Abono</button></a>@endif
					</td>
				</tr>
						<?php }
					} ?>
				@endforeach
				<tr >
				<td colspan="2" align="center"><button type="button" class="btn bg-olive btn-flat margin"><strong><?php echo "Cuentas por Cobrar: ".number_format( $total, 2,',','.')." $";?></strong></button></td>
				<td colspan="2" align="center"><button type="button" class="btn btn-warning btn-flat margin"><strong><?php echo "Debito: ".number_format( $acumnd, 2,',','.')." $";?></strong></button></td>
				<td colspan="2" align="center"><button type="button" class="btn btn-primary btn-flat margin"><strong><?php echo "Credito: ".number_format( $acumnc, 2,',','.')." $";?></strong></button></td>
				<td colspan="3" align="center"><button type="button" class="btn bg-black btn-flat margin"><strong><?php echo "Total: ".number_format( (($total+$acumnd)-$acumnc), 2,',','.')." $";?></strong></button></td>
				</tr>
				</tbody>
			</table>{{$pacientes->render()}}
		</div>
		
	</div>
</div>

@endsection
@push('scripts')
<script>
  
</script>
@endpush
