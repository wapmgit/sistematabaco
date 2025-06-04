@extends ('layouts.master')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Produccion @if($rol->newproceso==1)<a href="{{route('newproduccion')}}"><button class="btn btn-primary btn-sm">Nuevo</button></a>@endif</h3>
		@include('produccion.search')
	</div>
</div>
<?php $cont=0; ?>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Pro</th>
                    <th>Fecha</th>
                    <th>Cocedor</th>
                    <th>Parrilla</th>
                    <th>Turno</th>
                    <th>Kg Cocina</th>
                    <th>Kg Bajado</th>
                    <th>Kg Jalea</th>
                    <th>% Rend.</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
				        @foreach ($datos as $dat)
                  <tr>
                    <td>{{$dat->idproceso}}
						<?php if($dat->estatus==0){ ?>
					@if($rol->anularproduccion==1)
					<a href="" data-target="#modaldelete-{{$dat->idproceso}}" data-toggle="modal" >
					<i class="fa fa-trash"></i></a>@endif
						<?php } ?></td>
                    <td>{{$dat->fecha}}</td>
                    <td>{{$dat->cocedor}}</td>
                    <td>{{$dat->parrilla}}</td>
                    <td>{{$dat->turno}}</td>
                    <td>{{$dat->kgcocina}}</td>
                    <td>{{$dat->kgbajado}}</td>
                    <td>{{$dat->kgjalea}}</td>
                    <td>{{$dat->rendimiento}}</td>
                   <td>
					@if($rol->showproduccion==1)	<a href="{{route('showproduccion',['id'=>$dat->idproceso])}}"><button class="btn btn-warning btn-xs">Ver</button></a>@endif
					@if($rol->closeproceso==1)
					<?php if($dat->estatus==0){ ?>	<a href="" data-target="#modal-close{{$dat->idproceso}}" data-toggle="modal" ><button class="btn btn-danger btn-xs">Cerrar</button></a>
					<?php } ?>
					@endif
					</td>
                  </tr>
				  @include('produccion.modal')					
			@include('produccion.modaldelete')	
				@endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Pro</th>
                    <th>Fecha</th>
                    <th>Cocedor</th>
                    <th>Parrilla</th>
                    <th>Turno</th>
                    <th>Kg Cocina</th>
                    <th>Kg Bajado</th>
                    <th>Kg Jalea</th>
                    <th>% Rend.</th>
                    <th>Opciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
</div>
@push ('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	
    $('#example2').DataTable({
	  "order": [[ 1, 'desc' ]],
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  	function cerrar(id){  
	document.getElementById('benviar'+id).style.display="none";
	}
	function cerrarmodal(id){  
	$("#tobos"+id).val(0);
	$("#bajado"+id).val(0);
	$("#sobrante"+id).val(0);
	$("#kgj"+id).val(0)
	}
	function calcular(id){ 
	var cnttobo=$("#tobos"+id).val();
	var cntjalea=$("#sobrante"+id).val();
	var kgj= (parseFloat(cnttobo)*24)+parseFloat(cntjalea);
	$("#kgj"+id).val(kgj);
	}
</script>
@endpush
@endsection