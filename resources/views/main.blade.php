@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->


        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row" style="">
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> pH </b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikph.php" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> Temperature</b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikTemp.php" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> Humidity</b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikHumidity.php" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> Total Dissolved Solids</b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikTDS.php" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> Turbidity</b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikTurbidity.php" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div class="info-box-content">
                        <span class="info-box-text" style="text-align: center; margin-bottom:10px;">
                            <h5><b> Dissolved Oxygen</b></h5>
                        </span>
                        <iframe src="http://localhost/aquaponic/public/grafik/grafikOxygen.php" style="height:20vw;"></iframe>
                    </div>
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.content-header -->


        <script type="text/javascript">
            document.getElementById("beranda").innerHTML =
                '<a href="/" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a>';
        </script>


        <script type="text/javascript">
            document.getElementById("beranda").innerHTML =
                '<a href="/" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a>';
        </script>


        @endsection
