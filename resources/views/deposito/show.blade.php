@extends ('layouts.master')
@section ('contenido')
		  <!-- Main content -->
	<div class="invoice p-12 mb-12">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
              <img src="{{asset('dist/img/iconosistema.png')}}" title="NKS">SysVent@s
                    <small class="float-right"></small>
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

				  <h4>Articulos en Deposito</h4>
              
				</div>
					<div class="col-sm-3 invoice-col" align="center">
				<img src="{{asset('dist/img/logo.png')}}" width="50%" height="80%" title="NKS">
				</div>
              </div>
		<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Nombre</label>
                   <p>{{$dep->nombre}}</p>
                    </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                 <div class="form-group">
                      <label for="proveedor">Encargado</label>
                   <p>{{$dep->encargado}}</p>
                    </div>
            </div>
			   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="form-group">
                      <label for="proveedor">Telefono</label>
                   <p>{{$dep->movil}}</p>
                    </div>

            </div>
		</div>
        <div class ="row">

                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table id="detalles" width="100%">
                      <thead style="background-color: #E6E6E6">
                     
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th>Stock</th>
                          <th>Monto</th>
              </thead><?php $acumcosto=0; $cont=0; $acumprecio=0; $acum=0; $monto=0;?>
                      <tbody>
                        @foreach($datos as $det) <?php $cont++; ?>
                        <tr > <?php $acumcosto=($acumcosto+($det->precio*$det->cantidad)); $acum=($acum+$det->cantidad);
						$acumprecio=($acumprecio+$det->precio); $monto=($monto+($det->cantidad*$det->precio)); ?>
                          <td>{{$det->codigo}}</td>
                          <td>{{$det->nombre}}</td>
                          <td>{{$det->precio}}</td>
                          <td>{{$det->cantidad}}</td>
                          <td>{{$det->cantidad*$det->precio}}</td>
                          
                        </tr>
                        @endforeach
                      </tbody> 
					  <tr style="background-color: #E6E6E6"><td colspan="2"><strong>Total: <?php echo $cont. " Articulos."; ?></strong></td>
					  <td></td>
					  <td><strong><?php echo number_format($acum, 2,',','.');?></strong></td>
					  <td><strong><?php echo number_format($monto, 2,',','.');?></strong></td></tr>
                  </table>
                 
                    </div>
                </div>   
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
	window.location="{{route('deposito')}}";
		});
		$('#regresar').click(function(){
	window.location="{{route('deposito')}}";
		});

});

</script>

@endpush