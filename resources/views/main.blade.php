@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row" style="">
                    <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                        <div class="info-box-content">
                            <span class="info-box-text" style="text-align: center;">
                                <h5><b> PH Kolam</b></h5>
                            </span>
                            <iframe src="http://localhost/aquaponic/public/grafik/grafikph.php"
                                style="height:20vw;"></iframe>
                        </div>
                    </div>
                    <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                        <div class="info-box-content">
                            <span class="info-box-text" style="text-align: center;">
                                <h5><b> Suhu Kolam</b></h5>
                            </span>
                            <iframe src="http://localhost/aquaponic/public/grafik/grafikph.php"
                                style="height:20vw;"></iframe>
                        </div>
                    </div>
                    <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                        <div class="info-box-content">
                            <span class="info-box-text" style="text-align: center;">
                                <h5><b> Kelembaban Kolam</b></h5>
                            </span>
                            <iframe src="http://localhost/aquaponic/public/grafik/grafikph.php"
                                style="height:20vw;"></iframe>
                        </div>
                    </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>

    <script type="text/javascript">
        document.getElementById("beranda").innerHTML =
            '<a href="/" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a>';
    </script>


    <li class="nav-item nav-item menu-is-opening menu-open">
    @endsection
