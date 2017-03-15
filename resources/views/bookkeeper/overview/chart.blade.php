<div class="chart" id="chartTabs">

    <div class="chart__info">
        {{ uppercase(trans('overview.total_income') . ': ' . $statistics['total_income'] . ' . ' .
            trans('overview.total_expense') . ': ' . $statistics['total_expense'] . ' . ' .
            trans('overview.total_profit') . ': ' . $statistics['total_profit']
        ) }}
    </div>

    <div class="chart__container">
        <canvas height="88" id="overviewGraph"></canvas>
    </div>

</div>

@section('scripts')
    @parent

    {!! Theme::js('js/charts.js') !!}

    <script>
        var overviewOptions = {
            type: 'line',
            data: {
                labels: {!! json_encode($statistics['labels']) !!},
                datasets: [
                    @foreach($statistics['statistics'] as $type => $data)
                    $.extend({
                        label: '{{ uppercase(trans('transactions.' . $type)) }}',
                        data: {!! json_encode($data) !!},
                        pointBorderColor: window.chartColors.{{ $type }}.pointBorderColor,
                        borderColor: window.chartColors.{{ $type }}.borderColor,
                    }, window.chartDisplayDefaults),
                    @endforeach
                ]
            },
            options: {scales: {yAxes: [{gridLines: {color: 'transparent'}}]}}
        };

        window.onload = function () {
            var overviewCtx = document.getElementById("overviewGraph").getContext("2d");
            new Chart(overviewCtx, overviewOptions);
        }
    </script>
@endsection