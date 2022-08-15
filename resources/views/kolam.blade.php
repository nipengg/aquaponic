@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kolam</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Kolam</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" id="formInput">

                            <h3 class="card-title">Kolam</h3>
                            <button type="button" onclick="inputForm()" class="btn btn-success float-right"><i class="fas fa-plus"
                                    ></i> Tambah
                                Data</button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>Suhu</th>
                                        <th>PH</th>
                                        <th>Kekeruhan</th>
                                        <th>Oksigen</th>
                                        <th>Zat Terlarut</th>
                                        <th>Oksidasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Kolam";
        document.getElementById("kolam").innerHTML =
            '<a href="/kolam" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Kolam</p></a>';
        document.getElementById("TopTitle").innerHTML = "Kolam";

        function noInputForm() {
            document.getElementById("formInput").innerHTML = '<h3 class="card-title">Kolam</h3><button type="button" onclick="inputForm()" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</button>';
        }

        function inputForm() {
            document.getElementById("formInput").innerHTML =
                '<h3 class="card-title">Kolam</h3><button type="button" onclick="noInputForm()" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</button><form><div class="card-body" style="padding-top: 2%;"><div style="margin-top:20px;" class="form-group"><label for="exampleInputEmail1">Nama Kolam</label><input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"></div><div class="form-group"><label for="exampleInputEmail1">Area</label><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Area (m)"></div><div class="form-group"><label>Deskripsi</label><textarea class="form-control" rows="3" placeholder="Enter ..."></textarea></div></div></form>';
        }
    </script>
@endsection
