<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-{{$cat->iddeposito}}">
<form action="{{route('donacion')}}" method="POST" id="" enctype="multipart/form-data" >
{{csrf_field()}}
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-primary">
			    <div class="modal-header ">
                     <h5 class="modal-title">Registrar Datos de Donacion {{ $cat->descripcion}}</h5>
				     <button type="button" class="close" data-dismiss="modal" 
			        	aria-label="Close">
                     <span aria-hidden="true">×</span>
                      </button>
                 
			    </div>
	    	</div>
			<div class="modal-body">
				<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <div class="form-group">
            	<label for="descripcion">Tanque</label>
				<select name="tanque" id="tanque" class="form-control" >
				@foreach($tanques as $t)
				 <?php  if (($t->iddeposito == $cat->iddeposito) and ($t->uso > 0)){?>
				 <option value="{{$t->idtanque}}" selected>{{$t->nombre}} -> {{ $t-> uso}}</option>
				 <?php } ?>
				@endforeach
				</select>

            </div>         
		</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
			<label>Litros</label>
						<input type="number" name="litros" id=""  min="1" required class="form-control" id="litros">	
						<input type="hidden" name="deposito"   class="form-control" value="{{$cat->iddeposito}}">	
			</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
			<label>Beneficiario</label>
						<input type="text" name="beneficiario"  required  class="form-control" >	
			</div>
				</div>
			<!-- del row -->
		</div>  <!-- del modal body-->
			<div class="modal-primary">
			    <div class="modal-footer">
                    <div class="form-group">
                    <button type="button" class="btn btn-default btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" onclick="javascript:enviadatos(<?php echo $cont; ?>);"  id="<?php echo "btn".$cont; ?>" class="btn btn-primary btn-outline pull-right" >Confirmar</button>
                    </div>
		    	</div>
			</div>
			
    </form>   
</div>
</div>
</div>

