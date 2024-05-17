@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
<!--                 <div id="container" style="width: 100%;">                     
                    <canvas id="canvas"></canvas>                 
                </div>  -->

                <div class="panel">
                    <div id="canvas"></div>
                </div>
                <div class="panel">
                    <div id="canvasproduk"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- dependency  untuk membuat chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('canvasproduk', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Produk Per Kategori',
        align: 'center'
    },
   
    xAxis: {

        categories: {!! $label !!},
        crosshair: true,
        accessibility: {
            description: 'Kategori'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Produk'
        }
    },
    tooltip: {
        valueSuffix: ' (pcs)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Produk per Kategori',
            data: {!! $value !!}
        }
        ]
});

</script>

@endsection
