
<?php
$koneksi    = mysqli_connect("localhost", "root", "", "aquaponic");
$phValue         = mysqli_query($koneksi, "SELECT * FROM phValue WHERE pools_id = '1'");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Chartjs, PHP dan MySQL Demo Grafik Garis</title>
  <script src="Chart.js"></script>
  <style type="text/css">
    .container {
      width: 100%;
      margin: 15px auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <canvas id="linechart"></canvas>
  </div>

</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
    labels: ["ph1", "ph2", "ph3", "ph4", "ph5", "ph6"],
    datasets: [{
        label: "pH Air",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#F07124",
        borderColor: "#F07124",
        pointHoverBackgroundColor: "#F07124",
        pointHoverBorderColor: "#F07124",
        data: [<?php while ($p = mysqli_fetch_array($phValue)) {
                  echo '"' . $p['ph1'] . '","' . $p['ph2'] . '","' . $p['ph3'] . '","' . $p['ph4'] . '","' . $p['ph5'] . '",';
                } ?>]
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