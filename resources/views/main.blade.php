@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tint"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kolam</span>
                            <span class="info-box-number">
                                {{ $pools_count }}
                                <small>Kolam</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thermometer"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Data Kolam</span>
                            <span class="info-box-number">{{ $pools_data_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User Count</span>
                            <span class="info-box-number">{{ $users_count }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <script>
                var poolsDataAtribut = {!! json_encode($pools_data->toArray()) !!};
                var DataKolam = {!! json_encode($pools->toArray()) !!};
                // console.log(DataKolam)

                var count = 0;
                var x = [];
                var xitung = [];

                // ini buat id di pool aja
                for (var i = 0; i < DataKolam.length; i++) {
                    x[i + 1] = DataKolam[i].id;
                    // console.log(x[i+1])
                }

                // ini buat id di poolsData
                for (var i = 0; i < poolsDataAtribut.length; i++) {
                    xitung[i + 1] = poolsDataAtribut[i].id;
                    // console.log(xitung[i+1])
                }
            </script>

            @foreach ($pools_data as $time)
                <input id="getIdPool{{ $time->id }}" type="hidden" value="{{ $time->pool_id }}">
                <input id="getTime{{ $time->id }}" type="hidden" value="{{ $time->created_at->format('H:i:s') }}">
            @endforeach

            @foreach ($pools as $pool)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $pool->name }}</h5>
                                <input id="varPool{{ $pool->id }}" type="hidden" value="{{ $pool->id }}">

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-center">
                                            <strong>{{ $today }}</strong>
                                        </p>

                                        <div class="chart" style="height: 250px;">
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="salesChart{{ $pool->id }}" height="180"
                                                style="height: 180px;"></canvas>
                                        </div>

                                        <!-- /.chart-responsive -->

                                    </div>
                                    <!-- /.col -->



                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Latest value</strong>
                                        </p>

                                        <div id="ph{{ $pool->id }}" class="progress-group">
                                            PH
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" style="background-color:#fca903; width: 0%">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->

                                        <div id="Temp{{ $pool->id }}" class="progress-group">
                                            Temperature
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-danger" style="width: 0%"></div>
                                            </div>
                                        </div>

                                        <!-- /.progress-group -->
                                        <div id="Hum{{ $pool->id }}" class="progress-group">
                                            Humidity
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                                            </div>
                                        </div>

                                        <!-- /.progress-group -->
                                        <div id="Tds{{ $pool->id }}" class="progress-group">
                                            Total Dissolved Solid (TDS)
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" style="background-color:#34ebbd; width: 0%">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Tur{{ $pool->id }}" class="progress-group">
                                            Turbidity
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" style="background-color:#6e4d1d; width: 0%">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Oxy{{ $pool->id }}" class="progress-group">
                                            Dissolved Oxygen
                                            <span class="float-right"><b>0</b>/0</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" style="background-color:#5cceff; width: 0%">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                    </div>
                                    <!-- /.col -->



                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div id="statusPh{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">PH</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div id="statusTemp{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">TEMPERATURE</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div id="statusHum{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">HUMIDITY</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <div id="statusTds{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">TOTAL DISSOLVED SOLID</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <div id="statusTur{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">TURBIDITY</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div id="statusOxy{{ $pool->id }}" class="col-sm-2 col-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-danger"> No Data Available</span>
                                            <h5 class="description-header">0</h5>
                                            <span class="description-text">DISSOLVED OXYGEN</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <script type="text/javascript">
                    var nilaiPh = [];
                    var nilaiTemp = [];
                    var nilaiHum = [];
                    var nilaiTds = [];
                    var nilaiTur = [];
                    var nilaiOxy = [];

                    count++;



                    //get id from input html
                    var namaidpool = "varPool" + x[count];
                    var idChart = "salesChart" + x[count];
                    var idPool = document.getElementById(namaidpool).value;

                    // change the data GetElementById
                    //Ph
                    var tempPh = "ph" + x[count];
                    var StatusPh = "statusPh" + x[count];
                    //temp
                    var tempTemp = "Temp" + x[count];
                    var StatusTemp = "statusTemp" + x[count];
                    //Humidity
                    var tempHum = "Hum" + x[count];
                    var StatusHum = "statusHum" + x[count];
                    //TDS
                    var tempTds = "Tds" + x[count];
                    var StatusTds = "statusTds" + x[count];
                    //Turbidity
                    var tempTur = "Tur" + x[count];
                    var StatusTur = "statusTur" + x[count];
                    //Oxygen
                    var tempOxy = "Oxy" + x[count];
                    var StatusOxy = "statusOxy" + x[count];



                    var yitung = 0;
                    var itung = 0;
                    var y = 0;
                    var clock = [];
                    console.log("looping UTAMA ke" + x[count])
                    for (var i = 0; i < poolsDataAtribut.length; i++) {
                        //getElementID pool and time
                        itung++;
                        var elementidPool = "getIdPool" + xitung[itung];
                        var elementidTime = "getTime" + xitung[itung];

                        var IdPoolGet = document.getElementById(elementidPool).value;
                        var TimeGet = document.getElementById(elementidTime).value;

                        if (IdPoolGet == idPool) {
                            yitung++;
                            clock[yitung] = TimeGet;
                            console.log(clock[yitung])
                        }

                        if (poolsDataAtribut[i].pool_id == idPool) {

                            //save in array to pass data in grafik
                            //Ph value
                            nilaiPh[y] = poolsDataAtribut[i].ph_val;

                            //Temp value
                            nilaiTemp[y] = poolsDataAtribut[i].temper_val;

                            //Humidity value
                            nilaiHum[y] = poolsDataAtribut[i].humidity_val;

                            //TDS value
                            nilaiTds[y] = poolsDataAtribut[i].tds_val;

                            //Turbidity value
                            nilaiTur[y] = poolsDataAtribut[i].turbidities_val;

                            //Oxygen value
                            nilaiOxy[y] = poolsDataAtribut[i].oxygen_val;



                            y++;

                            // get the latest data from poolsDataAtribut

                            //PH variable
                            var lastPH = poolsDataAtribut[i].ph_val;
                            var progressPh = (poolsDataAtribut[i].ph_val / 14) * 100;

                            if (progressPh < 48, 5 || progressPh > 50)
                                var phStatus = "Not Ideal Score";
                            else
                                var phStatus = "Good PH Score";

                            //Temp variable
                            var lastTemp = poolsDataAtribut[i].temper_val;
                            var progressTemp = (poolsDataAtribut[i].temper_val / 100) * 100;

                            if (progressTemp < 20 || progressTemp > 30)
                                var TempStatus = "Not Ideal Score";
                            else
                                var TempStatus = "Good Temp Score";

                            //Hum variable
                            var lastHum = poolsDataAtribut[i].humidity_val;
                            var progressHum = (poolsDataAtribut[i].humidity_val / 100) * 100;

                            if (progressHum < 60 || progressHum > 80)
                                var HumStatus = "Not Ideal Score";
                            else
                                var HumStatus = "Good Humidty Score";

                            //Tds variable
                            var lastTds = poolsDataAtribut[i].tds_val;
                            var progressTds = (poolsDataAtribut[i].tds_val / 1500) * 100;

                            if (progressTds < 1050 || progressTds > 1200)
                                var TdsStatus = "Not Ideal Score";
                            else
                                var TdsStatus = "Good Tds Score";

                            //Tur variable
                            var lastTur = poolsDataAtribut[i].turbidities_val;
                            var progressTur = (poolsDataAtribut[i].turbidities_val / 50) * 100;

                            if (progressTur < 1 || progressTur > 5)
                                var TurStatus = "Not Ideal Score";
                            else
                                var TurStatus = "Good Tur Score";

                            //Oxy variable
                            var lastOxy = poolsDataAtribut[i].oxygen_val;
                            var progressOxy = (poolsDataAtribut[i].oxygen_val / 50) * 100;

                            if (progressOxy < 4 || progressOxy > 12)
                                var OxyStatus = "Not Ideal Score";
                            else
                                var OxyStatus = "Good Oxy Score";



                            // Progress Bar
                            //Ph
                            document.getElementById(tempPh).innerHTML = 'PH <span class="float-right"><b>' + lastPH +
                                '</b>/14</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#fca903; width: ' +
                                progressPh + '%"></div></div>';
                            //Temp
                            document.getElementById(tempTemp).innerHTML = 'Temperature (Celcius) <span class="float-right"><b>' +
                                lastTemp +
                                '</b>/100</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#DC3545; width: ' +
                                progressTemp + '%"></div></div>';
                            //Humidity
                            document.getElementById(tempHum).innerHTML = 'Humidity<span class="float-right"><b>' + lastHum +
                                '</b>/100</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#257CFF; width: ' +
                                progressHum + '%"></div></div>';
                            //Tds
                            document.getElementById(tempTds).innerHTML = 'Total Dissolved Solid (TDS)<span class="float-right"><b>' +
                                lastTds +
                                '</b>/1500</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#257CFF; width: ' +
                                progressTds + '%"></div></div>';
                            //Turbidity
                            document.getElementById(tempTur).innerHTML = 'Turbidity<span class="float-right"><b>' + lastTur +
                                '</b>/50</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#257CFF; width: ' +
                                progressTur + '%"></div></div>';
                            //Oxygen
                            document.getElementById(tempOxy).innerHTML = 'Oxygen<span class="float-right"><b>' + lastOxy +
                                '</b>/50</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#257CFF; width: ' +
                                progressOxy + '%"></div></div>';


                            // Status Data
                            document.getElementById(StatusPh).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                phStatus + '</span><h5 class="description-header">' + lastPH +
                                '</h5><span class="description-text">PH</span></div>';
                            document.getElementById(StatusTemp).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                TempStatus + '</span><h5 class="description-header">' + lastTemp +
                                '</h5><span class="description-text">Temp</span></div>';
                            document.getElementById(StatusHum).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                HumStatus + '</span><h5 class="description-header">' + lastHum +
                                '</h5><span class="description-text">Hum</span></div>';
                            document.getElementById(StatusTds).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                TdsStatus + '</span><h5 class="description-header">' + lastTds +
                                '</h5><span class="description-text">Tds</span></div>';
                            document.getElementById(StatusTur).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                TurStatus + '</span><h5 class="description-header">' + lastTur +
                                '</h5><span class="description-text">Tur</span></div>';
                            document.getElementById(StatusOxy).innerHTML =
                                '<div class="description-block"><span class="description-percentage text-success"><i class="fas fa-caret-up"></i>' +
                                OxyStatus + '</span><h5 class="description-header">' + lastOxy +
                                '</h5><span class="description-text">Oxy</span></div>';

                        }
                    }

                    //--------------
                    //- CHART -
                    //--------------





                    // Get context with jQuery - using jQuery's .get() method.
                    var lineChartCanvasPh = $('#' + idChart).get(0).getContext('2d')

                    var lineChartDataPh = {
                        labels: [clock[1], clock[2], clock[3], clock[4], clock[5]],
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
                            },
                            {
                                label: 'Temperature',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#DC3545',
                                borderColor: '#DC3545',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiTemp[0], nilaiTemp[1], nilaiTemp[2], nilaiTemp[3], nilaiTemp[4]]
                            },
                            {
                                label: 'Humidity',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#257CFF',
                                borderColor: '#257CFF',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiHum[0], nilaiHum[1], nilaiHum[2], nilaiHum[3], nilaiHum[4]]
                            },
                            {
                                label: 'Total Dissolved Solid',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#34ebbd',
                                borderColor: '#34ebbd',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiTds[0], nilaiTds[1], nilaiTds[2], nilaiTds[3], nilaiTds[4]]
                            },
                            {
                                label: 'Turbidity',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#6e4d1d',
                                borderColor: '#6e4d1d',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiTur[0], nilaiTur[1], nilaiTur[2], nilaiTur[3], nilaiTur[4]]
                            },
                            {
                                label: 'Dissolved Oxygen',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#5cceff',
                                borderColor: '#5cceff',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiOxy[0], nilaiOxy[1], nilaiOxy[2], nilaiOxy[3], nilaiOxy[4]]
                            },
                        ]
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
                </script>
            @endforeach



            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2022 <a href="#">Aquaponic</a>.</strong>
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->



        </body>

        </html>
    @endsection
