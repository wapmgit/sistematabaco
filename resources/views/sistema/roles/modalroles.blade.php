
<div class="modal fade" id="roles{{$q->id}}">
	<form action="{{route('updateuser')}}" method="post" enctype="multipart/form-data" >         
			{{csrf_field()}}
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar Privilegios de Usuario </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<div class="modal-body">
				<p align="center">Usuario: <label>{{ $q->name}} </label> 
				</p>
				  <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab{{$q->id}}" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab{{$q->id}}" data-toggle="pill" href="#custom-tabs-one-home{{$q->id}}" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Archivo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab{{$q->id}}" data-toggle="pill" href="#custom-tabs-one-profile{{$q->id}}" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Procesos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab{{$q->id}}" data-toggle="pill" href="#custom-tabs-one-messages{{$q->id}}" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Informes</a>
                  </li>
					<li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-sistema-tab{{$q->id}}" data-toggle="pill" href="#custom-tabs-one-sistema{{$q->id}}" role="tab" aria-controls="custom-tabs-one-sistema" aria-selected="false">Sistema</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home{{$q->id}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab{{$q->id}}">
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						 <div class="form-group">
						 <input type="hidden" value="{{$q->idrol}}" name="rol"></input>
						 <label>Crear Articulo: </label><label>
						  <input type="checkbox" name="op1" class="minimal" @if($q->newarticulo==1) checked @endif ></label>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Editar Articulo: </label><label>
					  <input type="checkbox" name="op2" class="minimal" @if($q->editarticulo==1) checked @endif ></label>
					</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Cocedor:</label><label>
					  <input type="checkbox" name="op3" class="minimal" @if($q->newcocedor==1) checked @endif ></label>

					</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Editar Cocedor: </label><label>
					  <input type="checkbox" name="op4" class="minimal" @if($q->editcocedor==1) checked @endif ></label>
					</div>
					</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Acceso Clientes: </label><label>
					  <input type="checkbox" name="op32" class="minimal" @if($q->clientes==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Cliente: </label><label>
					  <input type="checkbox" name="op5" class="minimal" @if($q->newcliente==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Editar Cliente: </label><label>
					  <input type="checkbox" name="op6" class="minimal" @if($q->editcliente==1) checked @endif ></label>
					</div>
				</div>
								   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Deposito: </label><label>
					  <input type="checkbox" name="op7" class="minimal" @if($q->newdeposito==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Editar Deposito: </label><label>
					  <input type="checkbox" name="op8" class="minimal" @if($q->editdeposito==1) checked @endif ></label>
					</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Detalle Deposito: </label><label>
					  <input type="checkbox" name="op9" class="minimal" @if($q->showdeposito==1) checked @endif ></label>
					</div>
				</div>
                  </div>
				  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile{{$q->id}}" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab{{$q->id}}">
                   <div  class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Acceso Ajustes: </label><label>
					  <input type="checkbox" name="op33" class="minimal" @if($q->ajuste==1) checked @endif ></label>
					</div>
				</div>
				   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Ajuste: </label><label>
					  <input type="checkbox" name="op10" class="minimal" @if($q->newajuste==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Ver Ajuste: </label><label>
					  <input type="checkbox" name="op11" class="minimal" @if($q->showajuste==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Produccion : </label><label>
					  <input type="checkbox" name="op12" class="minimal" @if($q->newproceso==1) checked @endif ></label>
					</div>
				</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Ver Produccion : </label><label>
					  <input type="checkbox" name="op13" class="minimal" @if($q->showproduccion==1) checked @endif ></label>
					</div>
				</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Cerrar Produccion : </label><label>
					  <input type="checkbox" name="op14" class="minimal" @if($q->closeproceso==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Acceso Venta : </label><label>
					  <input type="checkbox" name="op16" class="minimal" @if($q->ventas==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Crear Venta : </label><label>
					  <input type="checkbox" name="op17" class="minimal" @if($q->newventa==1) checked @endif ></label>
					</div>
				</div>			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Detalle Venta : </label><label>
					  <input type="checkbox" name="op18" class="minimal" @if($q->showventa==1) checked @endif ></label>
					</div>
				</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Anular Venta : </label><label>
					  <input type="checkbox" name="op19" class="minimal" @if($q->anularventa==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Traslados : </label><label>
					  <input type="checkbox" name="op20" class="minimal" @if($q->newtraslado==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Detalle Traslados : </label><label>
					  <input type="checkbox" name="op21" class="minimal" @if($q->showtraslado==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Control Tobos : </label><label>
					  <input type="checkbox" name="op28" class="minimal" @if($q->controltobos==1) checked @endif ></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Movimientos Tobos : </label><label>
					  <input type="checkbox" name="op29" class="minimal" @if($q->movtobos==1) checked @endif ></label>
					</div>
				</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					 <div class="form-group">
					 <label>Entobar : </label><label>
					  <input type="checkbox" name="op30" class="minimal" @if($q->entobar==1) checked @endif ></label>
					</div>
				</div>
				   </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages{{$q->id}}" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab{{$q->id}}">
						<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Reporte Clientes: </label><label>
						<input type="checkbox" name="op31" class="minimal" @if($q->rclientes==1) checked @endif ></label>
						</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Reporte inventario: </label><label>
						<input type="checkbox" name="op22" class="minimal" @if($q->rinventario==1) checked @endif ></label>
						</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Reporte Ventas: </label><label>
						<input type="checkbox" name="op23" class="minimal" @if($q->rventas==1) checked @endif ></label>
						</div>
						</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Reporte Produccion: </label><label>
						<input type="checkbox" name="op24" class="minimal" @if($q->rproduccion==1) checked @endif ></label>
						</div>
						</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Analisis Cocedor: </label><label>
						<input type="checkbox" name="op25" class="minimal" @if($q->analisis==1) checked @endif ></label>
						</div>
						</div>

						</div>
                  </div>
 
				<div class="tab-pane fade" id="custom-tabs-one-sistema{{$q->id}}" role="tabpanel" aria-labelledby="custom-tabs-one-sistema-tab{{$q->id}}">
					<div class="row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Actualizar Roles: </label><label>
						<input type="checkbox" name="op26" class="minimal" @if($q->actroles==1) checked @endif ></label>
						</div>
						</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label>Cambiar Contraseña: </label><label>
						<input type="checkbox" name="op27" class="minimal" @if($q->updatepass==1) checked @endif ></label>
						</div>
						</div>
					</div>
				</div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
				

			</div>
			<div class="modal-footer" >
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
</form>

</div>
