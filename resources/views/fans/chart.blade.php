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
var fans = <?php echo json_encode($fans)?>;

Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Ventiladores'
    },
    subtittle: {
        name: 'Cantidad de ventiladores'
    },
    xAxis: {

        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ]
    },
    yAxis: {
        title: {
            text: 'Cantidad de Ventiladores'
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
        name: 'Ventiladores',
        data: fans
    }],
    responsive: {

    }
});
</script>



<script type="text/javascript">
var fans2 = <?php echo json_encode($fans2)?>;

Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Ventiladores'
    },
    subtittle: {
        name: 'Nuevos ventiladores'
    },
    xAxis: {


        categories: ['1 voltaje', '2 voltaje', '3 voltaje', '4 voltaje', '5 voltaje', '6 voltaje', '7 voltaje',
            '8 voltaje', '9 voltaje', '10 voltaje'
        ]
    },
    yAxis: {
        title: {
            text: 'Cantidad de ventiladores'
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
        name: 'Ventiladores',
        data: fans2
    }],
    responsive: {

    }
});
</script>

@endsection