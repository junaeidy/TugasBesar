@extends('layouts.layout-admin')

@section('title' , 'Dashboard')
@section('header' , 'Dashboard')

@section('content')
<div class="row">
        <div class="col-lg-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $book_count }}</h3>
                    <p>Total Buku</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Total Anggota</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{ url('members') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $transaction_count }}</h3>

                    <p>Data Peminjaman</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <a href="{{ url('transactions') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
<section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-6">
                 <div class="card card-danger">
                     <div class="card-header">
                         <h3 class="card-title">Grafik Kategori</h3>

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
                         <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                     </div>
                     <!-- /.card-body -->
                 </div>
             </div>
             <!-- /.card -->
             <div class="col-md-6">
                 <div class="card card-success">
                     <div class="card-header">
                         <h3 class="card-title">Grafik Peminjaman</h3>

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
                             <canvas id="barChart"
                                 style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

    {{-- <script>
        // var label_donut = '{!! json_encode($label_donut) !!}';
        var data_donut = '{!! json_encode($data_donut) !!}';

    $(function (){

        //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
    })
    </script> --}}
@endsection