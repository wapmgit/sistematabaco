@extends ('layouts.master')
@section ('contenido')
		  <!-- Main content -->
	<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
              <img src="{{asset('dist/img/iconosistema.png')}}" title="NKS">NKS-Control                    <small class="float-right"></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
				<div class="col-sm-6 invoice-col">
				{{$empresa->nombre}}
                  <address>
                    <strong>{{$empresa->rif}}</strong><br>
                   {{$empresa->direccion}}<br>
                     Tel: {{$empresa->telefono}}<br>
                  </address>
				</div>
                <!-- /.col -->
				<div class="col-sm-3 invoice-col">

				  <h4>Kardex de un Articulo</h4>
              
				</div>
					<div class="col-sm-3 invoice-col" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="80%" title="NKS">
				</div>
              </div>
		<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Codigo</label>
                   <p>{{$datos->codigo}}</p>
                    </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Nombre</label>
                   <p>{{$datos->nombre}}</p>
                    </div>
            </div>
		</div>
        <div class ="row">

                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table id="detalles" width="100%">
                      <thead style="background-color: #E6E6E6">
                     
                          <th>Fecha</th>
                          <th>Usuario</th>
                          <th>Documento</th>
                          <th>Entrada</th>
                          <th>Salida</th>
                          <th>Stock</th>
              </thead><?php $acumin=0; $acumout=0; $in=0;$out=0;$cont=0; $stock=0;$acumprecio=0; $acum=0; $monto=0;?>
                      <tbody>
                        @foreach($detalles as $det) <?php $cont++; ?>
                        <tr > <?php  ?>
                          <td><?php echo date("d-m-Y",strtotime($det->fecha)); ?></td>
                          <td>{{$det->user}}</td>
                          <td>{{$det->documento}}</td>
                          <td><?php if($det->tipo==1){ $in=$det->cantidad; $acumin=$acumin+$in; $stock=$stock+$in; echo $det->cantidad; }?></td>
                          <td><?php if($det->tipo==2){$out=$det->cantidad; $acumout=$acumout+$out; $stock=$stock-$out;  echo $det->cantidad; }?></td>
                          <td><?php echo number_format($stock, 2,',','.');?></td>

                          
                        </tr>
                        @endforeach
                      </tbody>   
					  <tr style="background-color: #E6E6E6"><td colspan="3"><strong>Total: <?php echo $cont. " Items."; ?></strong></td>
					  <td><strong><?php echo number_format($acumin, 2,',','.');?></strong></td>
					  <td><strong><?php echo number_format($acumout, 2,',','.');?></strong></td>
					  <td><strong><?php echo number_format(($acumin-$acumout), 2,',','.');?></strong></td></tr>
                  </table>
                 
                    </div>
                </div>   
				<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="form-group" align="center"></br>
					 <button type="button" id="regresar" class="btn btn-danger btn-sm" data-dismiss="modal" title="Presione Alt+flecha izq. para regresar">Regresar</button>
                     <button type="button" id="imprimir" class="btn btn-primary btn-sm" data-dismiss="modal">Imprimir</button> 
                    </div>
          
       </div>
</div>	
@endsection
@push ('scripts')
<script>

$(document).ready(function(){
		$('#imprimir').click(function(){
	  document.getElementById('imprimir').style.display="none";
		document.getElementById('repreciar').style.display="none";
		document.getElementById('regresar').style.display="none";
	  window.print(); 
	window.location="{{route('articulos')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('articulos')}}";
		});

});

</script>

@endpush