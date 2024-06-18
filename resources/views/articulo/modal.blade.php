<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-tobo1">
<?php
$fserver=date('Y-m-d'); ?>
<form action="{{route('pasartobo')}}" method="POST" enctype="multipart/form-data" >
{{csrf_field()}}
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-primary">
                     <h5 class="modal-title" align="center">Pasar Jalea  Tobos <input type="hidden" name="fecha" value="<?php echo $fserver; ?>" class="form-control"></h5>
	    	</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
					<div class="card card-secondary">
					  <div class="card-header">
						<h3 class="card-title">Entobar </h3>
					  </div>
					  <div class="card-body">
					  <div class="row">
						<div class="col-md-12"  align="center">
							<div class="form-group">
							<label for="nombre">Cantidad Tobos</label>
							<input type="number" name="cnt" id="cnt" required placeholder="{{ $cat->stock/24}}"  max="{{ $cat->stock/24}}" class="form-control">
							<input type="hidden" name="idproceso" value="1" class="form-control" >
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
                    <div class="form-group" >
                    <button type="button" id="cerrar" class="btn btn-default btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="send" class="btn btn-primary btn-outline pull-right">Enviar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>
