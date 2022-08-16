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
    <canvas id="linechart"></canvas>
  </div>

  <h4 id="cek"></h4>
  <script>
    var sites = {!! json_encode($temperature->toArray()) !!};
    var nilai =[];
    for(var i=0; i<sites.length; i++){
      nilai[i] = sites[i].temper_val;
    }
  </script>


</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
    labels: ["Waktu-1", "Waktu-2", "Waktu-3", "Waktu-4", "Waktu-5"],
    datasets: [{
        label: "Temperature",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#F07124",
        borderColor: "#F07124",
        pointHoverBackgroundColor: "#F07124",
        pointHoverBorderColor: "#F07124",
        data: [nilai[0],nilai[1],nilai[2],nilai[3],nilai[4]]
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

       
