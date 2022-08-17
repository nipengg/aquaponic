<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <script src="{{ asset('grafik/Chart.js') }}"></script>
    <style type="text/css">
        .container {
            width: 100%;
            margin: 15px auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <canvas style="heigth:500px;" id="linechart"></canvas>
    </div>

    <h4 id="cek"></h4>
    <script>
        var sites = {!! json_encode($ph->toArray()) !!};
        console.log(sites)
        var nilaiPh = [];
        var waktu = [];
        for (var i = 0; i < sites.length; i++) {
            nilaiPh[i] = sites[i].ph_val;
        }
    </script>


</body>

</html>

<script type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");
    var data = {
        labels: ["waktu[0]", "waktu[1]", "waktu[2]", "waktu[3]", "waktu[4]"],
        datasets: [{
                label: "pH Air",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#F07124",
                borderColor: "#F07124",
                pointHoverBackgroundColor: "#F07124",
                pointHoverBorderColor: "#F07124",
                data: [nilaiPh[0], nilaiPh[1], nilaiPh[2], nilaiPh[3], nilaiPh[4]]
            }

        ]
    };

    var myBarChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            legend: {
                display: true
            },
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            }
        }
    });
</script>
