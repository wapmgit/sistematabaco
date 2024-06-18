<div class="modal  modal-primary" aria-hidden="true"
role="dialog" tabindex="-1" id="modaltobos-{{$cat->idcliente}}">
<?php
$fserver=date('Y-m-d'); ?>
<form action="{{route('control')}}" method="POST" id="formulariocredito" enctype="multipart/form-data" >    
{{csrf_field()}}
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-primary">
                     <h5 class="modal-title" align="center">Registro Tobos <input type="hidden" name="fecha" value="<?php echo $fserver; ?>" class="form-control"></h5>
	    	</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-secondary">
							<div class="card-header">
								<h3 class="card-title">{{$cat->nombre}}</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12" align="center">		
									<div class="form-group">
							       <label>Deposito / Existencia</label>
									<select name="deposito" id="deposito" class="form-control" >
									@foreach ($depositos as $dep)
									<option value="{{$dep -> iddeposito}}">{{$dep-> nombre}} -> {{$dep->existencia}}</option> 
									@endforeach
									</select>
									<input type="hidden" name="idcliente"  value="{{$cat->idcliente}}" class="form-control" >
									</div>
									</div>
									<div class="col-md-6" align="center">		
										<div class="form-group">
									<label for="tipo">Tipo</label>
									<select name="tipo" class="form-control">
									<option value="1" selected>Entrada</option>
									<option value="0">Salida</option>                         
									</select>
										</div>
									</div>
									<div class="col-md-6" align="center">		
									<div class="form-group">
										<label for="codigo">Cantidad</label>
										<input type="number" name="cantidad"  required  step="1" class="form-control" placeholder="cantidad...">
									</div>
									</div>
									<div class="col-md-12" align="center">		
									<div class="form-group">
									<label for="codigo">Observacion</label>
									<input type="text" name="observacion"  required  class="form-control" placeholder="Observacion...">
									</div>
									</div>
								</div>
							</div>
						</div><!-- /.card -->
					</div><!-- /.ccrd md-->
				</div>
				<!-- del row -->
			</div>  <!-- del modal body-->
			<div class="modal-primary">
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
			</div>
			
			</form>   
		</div>
	</div>
</div>
