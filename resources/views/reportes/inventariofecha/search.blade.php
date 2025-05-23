
<div class="card px-2" >
        <div class="card-header">
          <h3 class="card-title">Indique la fecha para la consulta</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>	<form action="{{route('report-inventariofecha')}}" method="GET" enctype="multipart/form-data" >         
			{{csrf_field()}}
        <div class="card-body p-0"></br>
		<div class="row">
		
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
				<div class="input-group">
					<input type="date" class="form-control" name="searchText"  value="{{$searchText}}">
				</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
				<select name="deposito" class="form-control">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($depo as $r)
				<option value="{{$r -> iddeposito}}">{{$r -> nombre}}</option> 
				@endforeach
				</select>
				</div>	
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
				<select name="articulo" class="form-control">
				 <option value="0" selected>Seleccione...</option>
				@foreach ($articulos as $q)
				<option value="{{$q -> idarticulo}}">{{$q -> nombre}}</option> 
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