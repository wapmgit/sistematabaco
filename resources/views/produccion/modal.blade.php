<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-close{{$dat->idproceso}}">
<?php
$fserver=date('Y-m-d'); 
?>
<form action="{{route('closeproduccion')}}" method="POST" id="form" enctype="multipart/form-data" >
{{csrf_field()}}
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-primary">
                     <h5 class="modal-title" align="center">Cerrar Turno <input type="hidden" name="fecha" value="<?php echo $fserver; ?>" class="form-control"></h5>
	    	</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
					<div class="card card-secondary">
					  <div class="card-header">
						<h3 class="card-title">Resultados </h3>
					  </div>
					  <div class="card-body">
					  <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="nombre">kg Bajado</label>
							<input type="number" name="kgb" required placeholder="Kg"  max="{{$dat->kgcocina}}" id="bajado<?php echo $dat->idproceso; ?>" step="0.01" class="form-control">
							<input type="hidden" name="idproceso" value="{{$dat->idproceso}}" class="form-control" >
							</div>
						</div>
						<div class="col-md-6" align="center">		
							<div class="form-group">
							<label for="nombre">Cnt. Tobos</label></br>
							 <input type="number" name="tobo" id="tobos<?php echo $dat->idproceso; ?>" required value="0"step="1" max="{{$dat->kgcocina/24}}" onchange="javascript:calcular({{$dat->idproceso}});"  class="form-control">
							</div>
						</div>
						<div class="col-md-6" align="center">		
							<div class="form-group">
							<label for="nombre">Kg Jalea</label></br>
							 <input type="number" name="sobrante" id="sobrante<?php echo $dat->idproceso; ?>" required value="0" step="0.01" max="24" onchange="javascript:calcular({{$dat->idproceso}});" class="form-control">
							</div>
						</div>
					<div class="col-md-6" align="center">		
							<div class="form-group">
							<label for="nombre">Total Jalea</label></br>
							 <input type="number" name="kgj" id="kgj<?php echo $dat->idproceso; ?>" required readonly placeholder="Kg"  max="{{$dat->kgcocina}}" class="form-control">
							</div>
						</div>
						<div class="col-md-12" align="center">		
							<div class="form-group">
							<label for="nombre">Observacion</label></br>
							<input type="text" name="obs"  class="form-control" placeholder="Observacion..">
							</div>
						</div>
					</div>
					</div>
					</div><!-- /.card -->
				</div><!-- /.ccrd md-->

	
          <!-- /.col (right) -->
				</div>
			<!-- del row -->
		</div>  <!-- del modal body-->
			<div class="modal-primary">
			    <div class="modal-footer">
                    <div class="form-group">
                    <button type="button" id="<?php echo 'bcerrar'.$dat->idproceso; ?>" onclick="javascript:cerrarmodal({{$dat->idproceso}});" class="btn btn-default btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="<?php echo 'benviar'.$dat->idproceso; ?>" onclick="javascript:cerrar({{$dat->idproceso}});" class="btn btn-primary btn-outline pull-right">Enviar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>
