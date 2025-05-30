@extends('main')

@section('title', 'Dashboard')
@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A basic column chart comparing estimated corn and wheat production
        in some countries.

        The chart is making use of the axis crosshair feature, to highlight
        the hovered country.
    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container-asalsma"></div>
    <p class="highcharts-description">
        A basic column chart comparing estimated corn and wheat production
        in some countries.

        The chart is making use of the axis crosshair feature, to highlight
        the hovered country.
    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container-tahunmasuk"></div>
    <p class="highcharts-description">
        A basic column chart comparing estimated corn and wheat production
        in some countries.

        The chart is making use of the axis crosshair feature, to highlight
        the hovered country.
    </p>
</figure>

{{-- CSS --}}
<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

</style>

{{-- JavaScript --}}
<script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa'
    },
    subtitle: {
        text:
            'Source: <a target="_blank" ' +
            'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswaprodi as $item)
            '{{ $item -> nama }}'
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: 'Orang'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'mahasiswa',
            data: [@foreach ($mahasiswaprodi as $item)
            {{  $item -> jumlah }},
            @endforeach]
        }
    ]
});


Highcharts.chart('container-asalsma', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Asal Sma'
    },
    subtitle: {
        text:
            'Source: <a target="_blank" ' +
            'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswaasalsma as $item)
            '{{ $item -> asal_sma }}'
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        valueSuffix: 'Orang'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Asal sma',
            data: [@foreach ($mahasiswaasalsma as $item)
            {{  $item -> jumlah }},
            @endforeach]
        }
    ]
});
Highcharts.chart('container-tahunmasuk', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Tahun Masuk'
    },
    subtitle: {
        text:
            'Source: <a target="_blank" ' +
            'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
    },
    xAxis: {
        categories: [
            @foreach ($mahasiswatahunmasuk as $item)
            '{{ $item -> tahun }}'
            @endforeach

        ],
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        valueSuffix: 'Orang'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Asal sma',
            data: [@foreach ($mahasiswatahunmasuk as $item)
            {{  $item -> jumlah }},
            @endforeach]
        }
    ]
});
</script>


@endsection