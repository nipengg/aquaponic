<?php
$koneksi    = mysqli_connect("localhost", "root", "", "aquaponic");
$phValue    = mysqli_query($koneksi, "SELECT * FROM phvals WHERE pool_id = '1' limit 6");
$datas = array();
if (mysqli_num_rows($phValue) > 0) {
  while ($dataSementara = mysqli_fetch_assoc($phValue)) {
    $datas[] = $dataSementara;
  }
}
$datas = json_encode($datas);
$datas = json_decode($datas);
$nilaiPh = array();
$no = 1;

for ($i = 1; $i <= 6; $i++) {
  $nilaiPh[$i] = 0;
}
foreach ($datas as $data) {
  $nilaiPh[$no] = $data->ph_val;
  $no++;
}
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
    labels: ["Waktu-1", "Waktu-2", "Waktu-3", "Waktu-4", "Waktu-5", "Waktu-6"],
    datasets: [{
        label: "pH Air",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#F07124",
        borderColor: "#F07124",
        pointHoverBackgroundColor: "#F07124",
        pointHoverBorderColor: "#F07124",
        data: [<?php
                echo '"' . $nilaiPh[1] . '","' . $nilaiPh[2] . '","' . $nilaiPh[3] . '","' . $nilaiPh[4] . '","' . $nilaiPh[5] . '","' . $nilaiPh[6] . '"';
                ?>]
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