
<div class="card px-2" >
        <div class="card-header">
          <h3 class="card-title">Indique Ruta para la consulta</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>	<form action="{{route('report-productor')}}" method="GET" enctype="multipart/form-data" >         
			{{csrf_field()}}
        <div class="card-body p-0"></br>
		<div class="row">
		
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="form-group">
				<select name="ruta" class="form-control selectpicker" data-live-search="true">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($rut as $r)
				<option value="{{$r -> idruta}}">{{$r -> nombre}}</option> 
				@endforeach
				</select>
			</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
				<div class="input-group">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary btn-sm">consultar</button>
					</span>
				</div>
				</div>
			</div>
	</div>
	</div>
		</form>
	</div>