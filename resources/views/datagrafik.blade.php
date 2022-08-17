<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aquaponic</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ asset('AdminLTE/dist/img/aquaponicLogo.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">


</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('AdminLTE/dist/img/aquaponicLogo.png') }}" alt="AquaponicLogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" id="TopTitle" class="nav-link">DASHBOARD</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <div class="info">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('AdminLTE/dist/img/aquaponicLogo.png') }}" alt="Aquaponic Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light ml-3">Aquaponic</span>
            </a>
            <div style="height: 10px"></div>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li id="beranda" class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Data Sensor
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/datasensor-table" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tabel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/datasensor-grafik" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grafik</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li id="kolam" class="nav-item">
                            <a href="/kolam" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>Kolam</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function handleSelectChange(event) {
            var idUrl = document.getElementById("pilihKolam").value;
            window.location.href = "{{ url('/datasensor-grafik/?id=') }}" + idUrl;
        }

        // PH Data
        var sitesPH = {!! json_encode($ph->toArray()) !!};
        var nilaiPh = [];
        for (var i = 0; i < sitesPH.length; i++) {
            nilaiPh[i] = sitesPH[i].ph_val;
        }

        // Temp Data
        var sitesTemp = {!! json_encode($temperature->toArray()) !!};
        var nilaiTemp = [];
        for (var i = 0; i < sitesTemp.length; i++) {
            nilaiTemp[i] = sitesTemp[i].temper_val;
        }
        // Hum Data
        var sitesHum = {!! json_encode($humidity->toArray()) !!};
        var nilaiHum = [];
        for (var i = 0; i < sitesHum.length; i++) {
            nilaiHum[i] = sitesHum[i].humidity_val;
        }
        // Oxygen Data
        var sitesOxy = {!! json_encode($oxygen->toArray()) !!};
        var nilaiOxy = [];
        for (var i = 0; i < sitesOxy.length; i++) {
            nilaiOxy[i] = sitesOxy[i].oxygen_val;
        }
        // TDS Data
        var sitesTds = {!! json_encode($TDS->toArray()) !!};
        var nilaiTds = [];
        for (var i = 0; i < sitesTds.length; i++) {
            nilaiTds[i] = sitesTds[i].tds_val;
        }
        // Turbidities Data
        var sitesTurbi = {!! json_encode($turbidity->toArray()) !!};
        var nilaiTurbi = [];
        for (var i = 0; i < sitesTurbi.length; i++) {
            nilaiTurbi[i] = sitesTurbi[i].turbidities_val;
        }

        //--------------
        //- PH CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasPh = $('#lineChart').get(0).getContext('2d')

        var lineChartDataPh = {
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'pH',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'Temperature',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'Humidity',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'Oxyidity',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'TDS',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
            labels: ['waktu1', 'waktu2', 'waktu3', 'waktu4', 'waktu5', 'waktu6', 'waktu6'],
            datasets: [{
                label: 'Turbi',
                fill: false,
                tension: 0,
                backgroundColor: '#FFC107',
                borderColor: '#FFC107',
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
