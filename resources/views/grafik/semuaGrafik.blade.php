<html>

<head>
    <title>line chart with ChartJS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://rawgit.com/nnnick/Chart.js/v1.0.2/Chart.min.js"></script>
    <style type="text/css">
        .container {
            height: 30rem;
            margin: 15px auto;
            padding: 50px;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            var ctx = document.getElementById("myChart").getContext("2d");
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        borderColor: rgba(220,220,220,0.2),
                        backgroundColor: white,
                        tension: 0.4,
                        // fillColor: "rgba(220,220,220,0.2)",
                        // strokeColor: "rgba(220,220,220,1)",
                        // pointColor: "rgba(220,220,220,1)",
                        // pointStrokeColor: "#fff",
                        // pointHighlightFill: "#fff",
                        // pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 0, 80, 81, 56, 85, 40]
                    },
                //     {
                //         label: "My Second dataset",
                //         fillColor: "rgba(151,187,205,0.2)",
                //         strokeColor: "rgba(151,187,205,1)",
                //         pointColor: "rgba(151,187,205,1)",
                //         pointStrokeColor: "#fff",
                //         pointHighlightFill: "#fff",
                //         pointHighlightStroke: "rgba(151,187,205,1)",
                //         data: [0, 0, 0, 0, 0, 0, 0]
                //     }
                ]
            };
            var data2 = [28, 48, 40, 19, 86, 27, 90];
            var done = false;
            var myLineChart = new Chart(ctx).Line(data, {
                type: 'line',
                data: data,
                options: {
                    animations: {
                        radius: {
                            duration: 400,
                            easing: 'linear',
                            loop: (context) => context.active
                        }
                    },
                    hoverRadius: 12,
                    hoverBackgroundColor: 'yellow',
                    interaction: {
                        mode: 'nearest',
                        intersect: false,
                        axis: 'x'
                    },
                    plugins: {
                        tooltip: {
                            enabled: false
                        }
                    }
                },
                // animationEasing: 'linear',
                // onAnimationComplete: function() {
                //     if (!done) {
                //         myLineChart.datasets[1].points.forEach(function(point, i) {
                //             point.value = data2[i];
                //         });
                //         myLineChart.update();
                //         done = true;
                //     }
                // }
            });
        }
    </script>
</head>

<body>
    <div class="container">
        <canvas id="myChart" style="height: 30rem"></canvas>
    </div>
</body>

</html>
