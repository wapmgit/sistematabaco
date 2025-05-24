<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-existencia-{{$cat->idarticulo}}">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-primary">
		<h5 class="modal-title" align="center">Existencias</h5>
	    	</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-12">
			<table border="0" width="100%">
				<tr><td><strong>Almacen</strong></td><td align="center"><strong>Cantidad</strong></td></tr>
				 @foreach ($existencia as $ex)
				 <?php if ($ex->idarticulo==$cat->idarticulo){
					 $acumexistencia=$acumexistencia+$ex->existencia;
					 ?>
				<tr><td>{{$ex->nombre}}</td><td align="center">{{$ex->existencia}}</td></tr>
				 <?php } ?>
				@endforeach<tr><td align="center" colspan="2"><strong>Total: <?php echo $acumexistencia; ?></strong></td></tr>
				</table>
				</div><!-- /.ccrd md-->

	
          <!-- /.col (right) -->
				</div>
			<!-- del row -->
		</div>  <!-- del modal body-->
			<div class="modal-primary">
			    <div class="modal-footer">
                    <div class="form-group" >
                    <button type="button" id="cerrar" class="btn btn-default btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>