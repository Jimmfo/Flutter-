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
var irons = <?php echo json_encode($irons)?>;

Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Planchas'
    },
    subtittle: {
        name: 'Nuevas planchas'
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
        name: 'Planchas',
        data: irons
    }],
    responsive: {

    }
});
</script>



<script type="text/javascript">
var irons2 = <?php echo json_encode($irons2)?>;

Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Planchas'
    },
    subtittle: {
        name: 'Planchas registradas'
    },
    xAxis: {


        categories: ['1 voltaje', '2 voltaje', '3 voltaje', '4 voltaje', '5 voltaje', '6 voltaje', '7 voltaje',
            '8 voltaje', '9 voltaje', '10 voltaje'
        ]
    },
    yAxis: {
        title: {
            text: 'Cantidad de Planchas'
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
        name: 'Planchas',
        data: irons2
    }],
    responsive: {

    }
});
</script>

@endsection