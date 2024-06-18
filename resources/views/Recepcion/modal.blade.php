<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-lab-{{$dat->idrecoleccion}}">
<?php
$fserver=date('Y-m-d'); ?>
<form action="{{route('laboratorio')}}" method="POST" id="<?php echo "form".$cont; ?>" enctype="multipart/form-data" >
{{csrf_field()}}
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-primary">
			    <div class="modal-header ">
                     <h5 class="modal-title">Registrar Datos de Laboratorio <input type="date" name="fecha" value="<?php echo $fserver; ?>" class="form-control"></h5>
				     <button type="button" class="close" data-dismiss="modal" 
			        	aria-label="Close">
                     <span aria-hidden="true">×</span>
                      </button>
                 
			    </div>
	    	</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-6">
					<div class="card card-secondary">
					  <div class="card-header">
						<h3 class="card-title">Resultados Tanque 1</h3>
					  </div>
					  <div class="card-body">
					  <div class="row">
						<div class="col-md-3">
							<div class="form-group">
							<label for="nombre">litros</label>
							<input type="number" name="ltst1" required placeholder="Ltrs"  class="form-control">
							<input type="hidden" name="idrecoleccion" value="{{$dat->idrecoleccion}}" class="form-control" >
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Alcohol</label></br>
							 <strong>+</strong><input type="radio" name="al" value="1">
							 <input type="radio" name="al" value="0" checked > <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Peroxido</label></br>
							 <strong>+</strong><input type="radio" value="1" name="pr">
							 <input type="radio" value="0" name="pr" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Suero</label></br>
							 <strong>+</strong><input type="radio" name="sr" value="1">
							 <input type="radio"  name="sr" value="0" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Sacaroza</label></br>
							 <strong>+</strong><input type="radio" name="sc" value="1" placeholder="Ltrs">
							 <input type="radio"  name="sc" value="0" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Acidez</label></br>
							<input type="number" name="acdz" required class="form-control" placeholder="%">
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
								<label >Rexasurina</label>
								<select name="rexa" id="idcategoria" class="form-control">	
								<option value="TRR3+H">1ra Escala</option>
								<option value="TRR3H">2da Escala</option>
								<option value="TRR2H">3ra Escala</option>
								<option value="TRR1H">4ta Escala</option>
								<option value="TRR0H">6ta Escala</option>
								</select>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Grasa</label></br>
							<input type="number" name="gra" required  class="form-control" placeholder="%">
							</div>
						</div>
							<div class="col-md-2" align="center">		
							<div class="form-group">
							<label for="nombre">Temperatura</label></br>
							<input type="number" name="temp" required  class="form-control" placeholder="°c">
							</div>
						</div>
						<div class="col-md-5" align="center">	
							<div class="form-group">
								<label >Deposito</label>
								<select name="dep1"  onchange="javascript:buscatanque('dep1',<?php echo $cont; ?>);"  id="<?php echo "dep1".$cont; ?>"  class="form-control">
							<option value="0">Seleccione...</option>
							@foreach ($dep as $d)
            				<option value="{{$d->iddeposito}}">{{$d->descripcion}}</option>
            				@endforeach
								</select>
							</div>
						</div>
							<div class="col-md-5" align="center">	
							<div class="form-group">
								<label >Tanque</label>
								<select name="tan1"  id="<?php echo "tan1".$cont; ?>" class="form-control">
									<option value="0">Esperando Deposito</option>            		          		
								</select>
							</div>
						</div>
					</div>
					</div>
					</div><!-- /.card -->
				</div><!-- /.ccrd md-->
				<div class="col-md-6">
					<div class="card card-secondary">
					  <div class="card-header">
						<h3 class="card-title">Resultados Tanque 2</h3>
					  </div>
					  <div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
							<label for="nombre">litros</label>
							<input type="number" name="ltst2" required placeholder="Ltrs"  class="form-control">
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Alcohol</label></br>
							 <strong>+</strong><input type="radio" name="al2" value="1">
							 <input type="radio" name="al2" value="0" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Peroxido</label></br>
							 <strong>+</strong><input type="radio" value="1" name="pr2">
							 <input type="radio" value="0" name="pr2" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Suero</label></br>
							 <strong>+</strong><input type="radio" name="sr2" value="1">
							 <input type="radio"  name="sr2" value="0" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Sacaroza</label></br>
							 <strong>+</strong><input type="radio" name="sc2" value="1" placeholder="Ltrs">
							 <input type="radio"  name="sc2" value="0" checked> <strong>-</strong>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Acidez</label></br>
							<input type="number" name="acdz2" required class="form-control" placeholder="%">
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
								<label >Rexasurina</label>
								<select name="rexa2" class="form-control">	
								<option value="TRR3+H">1ra Escala</option>
								<option value="TRR3H">2da Escala</option>
								<option value="TRR2H">3ra Escala</option>
								<option value="TRR1H">4ta Escala</option>
								<option value="TRR0H">6ta Escala</option>
								</select>
							</div>
						</div>
						<div class="col-md-3" align="center">		
							<div class="form-group">
							<label for="nombre">Grasa</label></br>
							<input type="number" name="gra2" required  class="form-control" placeholder="%">
							</div>
						</div>	
					<div class="col-md-2" align="center">		
							<div class="form-group">
							<label for="nombre">Temperatura</label></br>
							<input type="number" name="temp2" required  class="form-control" placeholder="°c">
							</div>
						</div>						
					<div class="col-md-5" align="center">				
							<div class="form-group">
								<label >Deposito</label>
								<select name="dep2" onchange="javascript:buscatanque2('dep2',<?php echo $cont; ?>);"  id="<?php echo "dep2".$cont; ?>"  class="form-control">
								<option value="0">Seleccione...</option>
							@foreach ($dep as $d)
            				<option value="{{$d->iddeposito}}">{{$d->descripcion}}</option>
            				@endforeach
								</select>
							</div>
						</div>
					<div class="col-md-5" align="center">				
							<div class="form-group">
								<label >Tanque</label>
								<select name="tan2"  id="<?php echo "tan2".$cont; ?>"  class="form-control">
									<option value="0">Esperando Deposito</option>           		
								</select>
							</div>
						</div>
						</div>
					  </div>
					  </div>
					</div>
	
          <!-- /.col (right) -->
				</div>
			<!-- del row -->
		</div>  <!-- del modal body-->
			<div class="modal-primary">
			    <div class="modal-footer">
                    <div class="form-group">
                    <button type="button" class="btn btn-default btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="javascript:enviar(<?php echo $cont; ?>);"  style="display: none"  class="btn btn-primary btn-outline pull-right"  id="<?php echo "btnsendlab".$cont; ?>" >Confirmar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>
