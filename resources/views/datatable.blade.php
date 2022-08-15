@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Table</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kolam</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                <tfoot>
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>Suhu</th>
                                        <th>PH</th>
                                        <th>Kekeruhan</th>
                                        <th>Oksigen</th>
                                        <th>Zat Terlarut</th>
                                        <th>Oksidasi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Table";
        document.getElementById("dataSensor").innerHTML =
            '<li class="nav-item menu-is-opening menu-open"><a href="#" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Data Sensor<i class="right fas fa-angle-left"></i></p></a><ul class="nav nav-treeview"><li class="nav-item "><a href="/datasensor-table" class="nav-link active"><i class="far fa-circle nav-icon"></i><p>Tabel</p></a></li><li class="nav-item"><a href="/datasensor-grafik" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Grafik</p></a></li></ul></li>';
    </script>
@endsection
