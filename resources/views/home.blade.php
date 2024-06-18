
@extends('layouts.master')
@section('contenido')
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 Produccion Diaria
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <table width="100%">
			  <tr><td align="center">Kg Subidos</td><td align="center">Kg Cocina</td><td align="center">Kg bajado</td><td align="center">Kg jalea</td><td align="center">kg tren</td></tr>
				<tr><td align="center">{{$pro->kgs}}</td><td align="center">{{$pro->kgc}}</td><td align="center">{{$pro->kgb}}</td><td align="center">{{$pro->kgj}}</td><td align="center">{{$pro->kgt}}</td></tr>
				</table>
                <h6>{{$pro->recep}} Turnos.</h5>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <!-- DONUT CHART -->
         <div class="card card-success">
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
        
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- /.col (LEFT) -->
          <div class="col-md-12">
 
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Produccion Jalea</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->

	@push('scripts')
<script>
$(document).ready(function(){
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
  

    var areaChartData = {
      labels: ["Enero","Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
      datasets: [
        {
          label               : 'Rendimniento',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
		  data: [
		<?php echo $cene->total.",".$cfeb->total.",".$cmar->total.",".$cabr->total.",".$cmay->total.",".$cjun->total.",".$cjul->total.",".$cago->total.",".$csep->total.",".$coct->total.",".$cnov->total.",".$cdic->total;
		?>  ]
        },
        {
          label               : 'Produccion',
          backgroundColor     : 'rgba(38, 147, 9, 1)',
          borderColor         : 'rgba(38, 147, 9, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(38, 147, 9, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(38, 147, 9,1)',
		  data: [
		<?php echo $vene->total.",".$vfeb->total.",".$vmar->total.",".$vabr->total.",".$vmay->total.",".$vjun->total.",".$vjul->total.",".$vago->total.",".$vsep->total.",".$voct->total.",".$vnov->total.",".$vdic->total;
		?>  ]
        },
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
   //- STACKED BAR CHART -
    //---------------------
	    var stackChartData = {
       labels  : [<?php foreach($dep as $d){
		 echo $d->idparrilla.",";  
	   }?>
	   ],
      datasets: [
        {
          label               : 'Cocina',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach($dep as $d){
		 echo $d->kgc.",";  
	   }?>]
        },
        {
          label               : 'Jalea',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php foreach($dep as $d){
		 echo $d->kgj.",";  
	   }?>]
        },
      ]
    }
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, stackChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
    })
</script>
@endpush
@endsection