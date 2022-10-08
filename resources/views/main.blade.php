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
                // console.log(poolsDataAtribut)

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
                                            <strong>{{ $today->toDayDateTimeString() }}</strong>
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
                    var banyakData = 0;
                    var clock = [];
                    // console.log("looping UTAMA ke" + x[count])

                    //bikin count untuk mengetahui banyak data pada id pool yang sama
                    console.log(poolsDataAtribut.length)
                    for (var i = 0; i < poolsDataAtribut.length; i++) {
                        if (poolsDataAtribut[i].pool_id == idPool) banyakData++;
                    }
                    if (banyakData >= 15) banyakData = 15;

                    for (var i = 0; i < poolsDataAtribut.length; i++) {
                        //getElementID pool and time
                        itung++;
                        var elementidPool = "getIdPool" + xitung[itung];
                        var elementidTime = "getTime" + xitung[itung];

                        var IdPoolGet = document.getElementById(elementidPool).value;
                        var TimeGet = document.getElementById(elementidTime).value;

                        if (IdPoolGet == idPool && banyakData >= 0 && banyakData <= 15) {

                            yitung++;
                            clock[banyakData] = TimeGet;
                            // console.log(clock[yitung])

                            //save in array to pass data in grafik
                            //Ph value
                            nilaiPh[banyakData] = poolsDataAtribut[i].ph_val;

                            //Temp value
                            nilaiTemp[banyakData] = poolsDataAtribut[i].temper_val;

                            //Humidity value
                            nilaiHum[banyakData] = poolsDataAtribut[i].humidity_val;

                            //TDS value
                            nilaiTds[banyakData] = poolsDataAtribut[i].tds_val;

                            //Turbidity value
                            nilaiTur[banyakData] = poolsDataAtribut[i].turbidities_val;

                            //Oxygen value
                            nilaiOxy[banyakData] = poolsDataAtribut[i].oxygen_val;

                            banyakData--;
                            y++;

                            // get the latest data from poolsDataAtribut

                            //PH variable
                            var lastPH = nilaiPh[nilaiPh.length-1];
                            var progressPh = (lastPH / 14) * 100;

                            if (lastPH < 6.8 || progressPh > 7) {
                                var phStatus = " Not Ideal Score";
                                var iconStatusPh = "fas fa-caret-down";
                                var textColorStatusPh = "text-danger";

                            } else {
                                var phStatus = " Good PH Score";
                                var iconStatusPh = "fas fa-caret-up";
                                var textColorStatusPh = "text-success";
                            }   

                            //Temp variable
                            var lastTemp = nilaiTemp[nilaiTemp.length-1];
                            var progressTemp = (lastTemp / 100) * 100;

                            if (lastTemp < 20 || lastTemp > 35) {
                                var TempStatus = " Not Ideal Score";
                                var iconStatusTemp = "fas fa-caret-down";
                                var textColorStatusTemp = "text-danger";
                            } else{
                                var TempStatus = " Good Temp Score";
                                var iconStatusTemp = "fas fa-caret-up";
                                var textColorStatusTemp = "text-success";
                            }

                            //Hum variable
                            var lastHum = nilaiHum[nilaiHum.length-1];
                            var progressHum = (lastHum / 50) * 100;

                            if (lastHum < 40 || lastHum > 60)
                            {
                                var HumStatus = " Not Ideal Score";
                                var iconStatusHum = "fas fa-caret-down";
                                var textColorStatusHum = "text-danger";
                            }
                            else{
                                var HumStatus = " Good Humidty Score";
                                var iconStatusHum = "fas fa-caret-up";
                                var textColorStatusHum = "text-success";
                            }

                            //Tds variable
                            var lastTds = nilaiTds[nilaiTds.length-1];
                            var progressTds = (lastTds / 20) * 100;

                            if (lastTds < 10 || lastTds > 12){
                                var TdsStatus = " Not Ideal Score";
                                var iconStatusTds = "fas fa-caret-down";
                                var textColorStatusTds = "text-danger";
                            }
                            else{
                                var TdsStatus = " Good Tds Score";
                                var iconStatusTds = "fas fa-caret-up";
                                var textColorStatusTds = "text-success";
                            }

                            //Tur variable
                            var lastTur = nilaiTur[nilaiTur.length-1];
                            var progressTur = (lastTur / 2000) * 100;

                            if (lastTur < 1050 || progressTur > 2000){
                                var TurStatus = " Not Ideal Score";
                                var iconStatusTur = "fas fa-caret-down";
                                var textColorStatusTur = "text-danger";
                            }
                            else{
                                var TurStatus = " Good Tur Score";
                                var iconStatusTur = "fas fa-caret-up";
                                var textColorStatusTur = "text-success";
                            }

                            //Oxy variable
                            var lastOxy = nilaiOxy[nilaiOxy.length-1];
                            var progressOxy = (lastOxy / 20) * 100;

                            if (progressOxy < 2 || progressOxy > 12){
                                var OxyStatus = " Not Ideal Score";
                                var iconStatusOxy = "fas fa-caret-down";
                                var textColorStatusOxy = "text-danger";
                            }
                            else{
                                var OxyStatus = " Good Oxy Score";
                                var iconStatusOxy = "fas fa-caret-up";
                                var textColorStatusOxy = "text-success";
                            }

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
                                '</b>/50</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#257CFF; width: ' +
                                progressHum + '%"></div></div>';
                            //Tds
                            document.getElementById(tempTds).innerHTML = 'Total Dissolved Solid (TDS)<span class="float-right"><b>' +
                                lastTds +
                                '</b>/20</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#3d9970; width: ' +
                                progressTds + '%"></div></div>';
                            //Turbidity
                            document.getElementById(tempTur).innerHTML = 'Turbidity<span class="float-right"><b>' + lastTur +
                                '</b>/2000</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#605ca8; width: ' +
                                progressTur + '%"></div></div>';
                            //Oxygen
                            document.getElementById(tempOxy).innerHTML = 'Oxygen<span class="float-right"><b>' + lastOxy +
                                '</b>/20</span><div class="progress progress-sm"><div class="progress-bar" style="background-color:#01ff70; width: ' +
                                progressOxy + '%"></div></div>';

                            // Status Data
                            document.getElementById(StatusPh).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage ' + textColorStatusPh +
                                '"><i class="' +
                                iconStatusPh + '"></i>' + phStatus + '</span><h5 class="description-header">' + lastPH +
                                '</h5><span class="description-text">PH</span></div>';
                            document.getElementById(StatusTemp).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage ' + textColorStatusTemp + '"><i class="' +
                                iconStatusTemp + '"></i>' +
                                TempStatus + '</span><h5 class="description-header">' + lastTemp +
                                '</h5><span class="description-text">Temperature</span></div>';
                            document.getElementById(StatusHum).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage ' + textColorStatusHum + '"><i class="' +
                                iconStatusHum + '"></i>' +
                                HumStatus + '</span><h5 class="description-header">' + lastHum +
                                '</h5><span class="description-text">Humidity</span></div>';
                            document.getElementById(StatusTds).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage ' + textColorStatusTds + '"><i class="' +
                                iconStatusTds + '"></i>' +
                                TdsStatus + '</span><h5 class="description-header">' + lastTds +
                                '</h5><span class="description-text">Tds</span></div>';
                            document.getElementById(StatusTur).innerHTML =
                                '<div class="description-block border-right"><span class="description-percentage ' + textColorStatusTur + '"><i class="' +
                                iconStatusTur + '"></i>' +
                                TurStatus + '</span><h5 class="description-header">' + lastTur +
                                '</h5><span class="description-text">Turbidity</span></div>';
                            document.getElementById(StatusOxy).innerHTML =
                                '<div class="description-block"><span class="description-percentage ' + textColorStatusOxy + '"><i class="' +
                                iconStatusOxy + '"></i>' +
                                OxyStatus + '</span><h5 class="description-header">' + lastOxy +
                                '</h5><span class="description-text">Oxygen</span></div>';

                        }
                    }
                    // console.log(banyakData)
                    //--------------
                    //- CHART -
                    //--------------

                    // Get context with jQuery - using jQuery's .get() method.
                    var lineChartCanvasPh = $('#' + idChart).get(0).getContext('2d')

                    var lineChartDataPh = {
                        labels: [clock[1], clock[2], clock[3], clock[4], clock[5], clock[6], clock[7], clock[8], clock[9], clock[10], clock[11], clock[12], clock[13], clock[14], clock[15]],
                        datasets: [{
                                label: 'pH',
                                fill: false,
                                tension: 0,
                                backgroundColor: '#fca903',
                                borderColor: '#fca903',
                                pointRadius: true,
                                hoverRadius: 8,
                                borderWidth: 3,
                                data: [nilaiPh[1], nilaiPh[2], nilaiPh[3], nilaiPh[4], nilaiPh[5], nilaiPh[6], nilaiPh[7], nilaiPh[8], nilaiPh[9], nilaiPh[10], nilaiPh[11], nilaiPh[12], nilaiPh[13], nilaiPh[14], nilaiPh[15]]
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
                                data: [nilaiTemp[1], nilaiTemp[2], nilaiTemp[3], nilaiTemp[4], nilaiTemp[5], nilaiTemp[6], nilaiTemp[7], nilaiTemp[8], nilaiTemp[9], nilaiTemp[10], nilaiTemp[11], nilaiTemp[12], nilaiTemp[13], nilaiTemp[14], nilaiTemp[15]]
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
                                data: [nilaiHum[1], nilaiHum[2], nilaiHum[3], nilaiHum[4], nilaiHum[5], nilaiHum[6], nilaiHum[7], nilaiHum[8], nilaiHum[9], nilaiHum[10], nilaiHum[11], nilaiHum[12], nilaiHum[13], nilaiHum[14], nilaiHum[15]]
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
                                data: [nilaiTds[1], nilaiTds[2], nilaiTds[3], nilaiTds[4], nilaiTds[5], nilaiTds[6], nilaiTds[7], nilaiTds[8], nilaiTds[9], nilaiTds[10], nilaiTds[11], nilaiTds[12], nilaiTds[13], nilaiTds[14], nilaiTds[15]]
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
                                data: [nilaiTur[1], nilaiTur[2], nilaiTur[3], nilaiTur[4], nilaiTur[5], nilaiTur[6], nilaiTur[7], nilaiTur[8], nilaiTur[9], nilaiTur[10], nilaiTur[11], nilaiTur[12], nilaiTur[13], nilaiTur[14], nilaiTur[15]]
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
                                data: [nilaiOxy[1], nilaiOxy[2], nilaiOxy[3], nilaiOxy[4], nilaiOxy[5], nilaiOxy[6], nilaiOxy[7], nilaiOxy[8], nilaiOxy[9], nilaiOxy[10], nilaiOxy[11], nilaiOxy[12], nilaiOxy[13], nilaiOxy[14], nilaiOxy[15]]
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

<script>
    document.getElementById("beranda").innerHTML =
            '<a href="/home" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a>';
</script>

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2022 <a href="#">Aquaponic</a>.</strong>
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

    @endsection
