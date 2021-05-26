@extends('layouts.Dashboard')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">

    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container2"></div>
    <p class="highcharts-description">

    </p>
</figure>
<script type="text/javascript">
var cameras = <?php echo json_encode($cameras)?>;

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Camaras'
    },
    subtittle: {
        name: 'Camaras   por pixeles'
    },
    xAxis: {

        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ]
    },
    yAxis: {
        title: {
            text: 'Cantidad de camaras'
        }
    },
    legend: {

        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'Camaras',
        data: cameras
    }],
    responsive: {

    }
});
</script>



<script type="text/javascript">
var cameras2 = <?php echo json_encode($cameras2)?>;

Highcharts.chart('container2', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Camaras'
    },
    subtittle: {
        name: 'Nuevas camaras'
    },
    xAxis: {


        categories: ['1pixeles', '5pixeles', '10 pixeles', '20 piexles', '30pixeles', '40pixeles', '50pixeles',
            '100pixeles'
        ]
    },
    yAxis: {
        title: {
            text: 'Cantidad de camaras'
        }
    },
    legend: {

        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            allowPointSelect: true
        }
    },
    series: [{
        name: 'Camaras',
        data: cameras2
    }],
    responsive: {

    }
});
</script>

@endsection