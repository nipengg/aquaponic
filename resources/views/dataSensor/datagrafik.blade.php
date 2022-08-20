@extends('layout.topsideBar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grafik</h1>
                    <div class="form-group" style="margin-bottom: -10px">
                        <label class="mt-3">Pilih Kolam</label>
                        <select id="pilihKolam" onchange="handleSelectChange()" class="form-control select2"
                            style="width: 100%;">

                            @foreach ($kolam as $key)
                                <option {{ $id == $key->id ? 'selected' : '' }} value="{{ $key->id }}">
                                    {{ $key->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Grafik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <!-- PH CHART -->
    <div class="container-fluid" style="padding: 20px; margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">PH Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Temperature CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Temperature Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="temperChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Humidity CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Humidity Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="humChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Oxygen CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Oxygen Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="OxyChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <!-- TDS CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">TDS Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="TdsChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Turbidity CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Turbidity Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="TurbiChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Grafik";
    </script>


    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>`
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="#">Aquaponic</a>.</strong>
        All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->


    <script type="text/javascript">
        function handleSelectChange(event) {
            var idUrl = document.getElementById("pilihKolam").value;
            window.location.href = "{{ url('/datasensor-grafik/?id=') }}" + idUrl;
        }

        //Waktu
        var getWaktu = {!! json_encode($ph->toArray()) !!};
        var waktu = [];
        var xhitung = 0;
        for (var i = getWaktu.length-1; i >= 0; i--) {
            var date = new Date(getWaktu[i].created_at);
            waktu[xhitung] = (date.getHours() < 10 ? '0' : '') + (date.getHours()) + ":" + (date.getMinutes() < 10 ? '0' : '') + date.getMinutes() + ":" + date.getSeconds();
            xhitung++;
        }

        // PH Data
        var sitesPH = {!! json_encode($ph->toArray()) !!};
        var nilaiPh = [];
        xhitung = 0;
        for (var i = sitesPH.length-1; i >= 0; i--) {
            nilaiPh[xhitung] = sitesPH[i].ph_val;
            xhitung++;
        }

        // Temp Data
        var sitesTemp = {!! json_encode($temperature->toArray()) !!};
        var nilaiTemp = [];
        xhitung = 0;
        for (var i = sitesTemp.length-1; i >= 0; i--) {
            nilaiTemp[xhitung] = sitesTemp[i].temper_val;
            xhitung++;
        }
        // Hum Data
        var sitesHum = {!! json_encode($humidity->toArray()) !!};
        var nilaiHum = [];
        xhitung = 0;
        for (var i = sitesHum.length-1; i >= 0; i--) {
            nilaiHum[xhitung] = sitesHum[i].humidity_val;
            xhitung++;
        }
        // Oxygen Data
        var sitesOxy = {!! json_encode($oxygen->toArray()) !!};
        var nilaiOxy = [];
        xhitung = 0;
        for (var i = sitesOxy.length-1; i >= 0; i--) {
            nilaiOxy[xhitung] = sitesOxy[i].oxygen_val;
            xhitung++;
        }
        // TDS Data
        var sitesTds = {!! json_encode($TDS->toArray()) !!};
        var nilaiTds = [];
        xhitung = 0;
        for (var i = sitesTds.length-1; i >= 0; i--) {
            nilaiTds[xhitung] = sitesTds[i].tds_val;
            xhitung++;
        }
        // Turbidities Data
        var sitesTurbi = {!! json_encode($turbidity->toArray()) !!};
        var nilaiTurbi = [];
        xhitung = 0;
        for (var i = sitesTurbi.length-1; i >= 0; i--) {
            nilaiTurbi[xhitung] = sitesTurbi[i].turbidities_val;
            xhitung++;
        }

        //--------------
        //- PH CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasPh = $('#lineChart').get(0).getContext('2d')

        var lineChartDataPh = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'pH',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiPh[0], nilaiPh[1], nilaiPh[2], nilaiPh[3], nilaiPh[4]]
            }, ]
        }

        var lineChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasPh, {
            type: 'line',
            data: lineChartDataPh,
            options: lineChartOptions
        })


        //--------------
        //- Temperature CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasTemp = $('#temperChart').get(0).getContext('2d')

        var lineChartDataTemp = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'Temperature',
                fill: false,
                tension: 0,
                backgroundColor: '#DC3545',
                borderColor: '#DC3545',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiTemp[0], nilaiTemp[1], nilaiTemp[2], nilaiTemp[3], nilaiTemp[4]]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasTemp, {
            type: 'line',
            data: lineChartDataTemp,
            options: lineChartOptions
        })
        //--------------
        //- Humidity CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasHum = $('#humChart').get(0).getContext('2d')

        var lineChartDataHum = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'Humidity',
                fill: false,
                tension: 0,
                backgroundColor: '#257CFF',
                borderColor: '#257CFF',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiHum[0], nilaiHum[1], nilaiHum[2], nilaiHum[3], nilaiHum[4]]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasHum, {
            type: 'line',
            data: lineChartDataHum,
            options: lineChartOptions
        })


        //--------------
        //- Oxygen CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasOxy = $('#OxyChart').get(0).getContext('2d')

        var lineChartDataOxy = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'Oxygen',
                fill: false,
                tension: 0,
                backgroundColor: '#5cceff',
                borderColor: '#5cceff',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiOxy[0], nilaiOxy[1], nilaiOxy[2], nilaiOxy[3], nilaiOxy[4]]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasOxy, {
            type: 'line',
            data: lineChartDataOxy,
            options: lineChartOptions
        })

        //--------------
        //- TDS CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasTds = $('#TdsChart').get(0).getContext('2d')

        var lineChartDataTds = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'TDS',
                fill: false,
                tension: 0,
                backgroundColor: '#34ebbd',
                borderColor: '#34ebbd',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiTds[0], nilaiTds[1], nilaiTds[2], nilaiTds[3], nilaiTds[4]]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasTds, {
            type: 'line',
            data: lineChartDataTds,
            options: lineChartOptions
        })
        //--------------
        //- Turbidity CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasTurbi = $('#TurbiChart').get(0).getContext('2d')

        var lineChartDataTurbi = {
            labels: [waktu[0], waktu[1], waktu[2], waktu[3], waktu[4]],
            datasets: [{
                label: 'Turbi',
                fill: false,
                tension: 0,
                backgroundColor: '#6e4d1d',
                borderColor: '#6e4d1d',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: [nilaiTurbi[0], nilaiTurbi[1], nilaiTurbi[2], nilaiTurbi[3], nilaiTurbi[4]]
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasTurbi, {
            type: 'line',
            data: lineChartDataTurbi,
            options: lineChartOptions
        })
    </script>
    </body>

    </html>
@endsection
