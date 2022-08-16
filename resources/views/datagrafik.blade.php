@extends('layout.topsideBar')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grafik</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Kolam</label>
                        <select id="pilihKolam" onchange="handleSelectChange()" class="form-control select2"
                            style="width: 100%;">

                            @foreach ($kolam as $key)
                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Grafik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row" style="">
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangePh" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5>
                        <iframe src="grafikph/1" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangeOx" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> Oxygen </b></h5>
                        <iframe src="grafikox/1" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangeHum" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> Humidity </b></h5>
                        <iframe src="grafikhum/1" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangeTemp" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> Temperature </b></h5>
                        <iframe src="grafiktemp/1" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangeTds" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> TDS </b></h5>
                        <iframe src="grafiktds/1" style="height:20vw;"></iframe>
                    </div>
                </div>
                <div class="info-box col-sm" style="margin-right: 10px; height:17vw;">
                    <div id="urlchangeTurbidity" class="info-box-content">
                        <h5 style="text-align: center; margin-bottom:10px;"><b> Turbidity </b></h5>
                        <iframe src="/grafikturbidity/1" style="height:20vw;"></iframe>
                    </div>
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.content-header -->


        <script>
            function handleSelectChange(event) {
                var value = document.getElementById("pilihKolam").value;
                document.getElementById("urlchangePh").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafikph/' + value +
                    '\'" style="height:20vw;"></iframe>'
                document.getElementById("urlchangeOx").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafikox/' + value +
                    '\'" style="height:20vw;"></iframe>'
                document.getElementById("urlchangeHum").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafikhum/' + value +
                    '\'" style="height:20vw;"></iframe>'
                document.getElementById("urlchangeTemp").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafiktemp/' + value +
                    '\'" style="height:20vw;"></iframe>'
                document.getElementById("urlchangeTds").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafiktds/' + value +
                    '\'" style="height:20vw;"></iframe>'
                document.getElementById("urlchangeTurbidity").innerHTML =
                    '<h5 style="text-align: center; margin-bottom:10px;"><b> pH </b></h5><iframe src="grafikturbidity/' +
                    value + '\'" style="height:20vw;"></iframe>'
            }
        </script>

        <script type="text/javascript">
            document.getElementById("TopTitle").innerHTML = "Data Grafik";
        </script>
    @endsection
