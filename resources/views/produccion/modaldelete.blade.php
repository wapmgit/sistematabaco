<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modaldelete-{{$dat->idproceso}}">
<?php
$fserver=date('Y-m-d'); 
?>
<form action="{{route('anularproduccion')}}" method="POST" id="form" enctype="multipart/form-data" >
{{csrf_field()}}
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
					<div class="card card-secondary">
					  <div class="card-header">
						<h3 class="card-title">Anular Produccion </h3>
					  </div>
					  <div class="card-body">
					  <div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<p>¿ Confirma Anular Produccion {{$dat->idproceso}} ?</p>						
							<input type="hidden" name="idproceso" value="{{$dat->idproceso}}" class="form-control" >
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
                    <button type="submit" class="btn btn-primary btn-outline pull-right">Confirmar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>
