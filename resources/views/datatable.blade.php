@extends('layout.topsideBar')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">

</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table</h3>
                        <div class="card-tools" style="padding-right: 10px;">
                            <select class="form-control" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                            </select>
                        </div>
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
    document.getElementById("TopTitle").innerHTML = "Data Table";

    document.getElementById("dataSensor").innerHTML = '<li class="nav-item menu-is-opening menu-open"><a href="#" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Data Sensor<i class="right fas fa-angle-left"></i></p></a><ul class="nav nav-treeview"><li class="nav-item "><a href="/datasensor-table" class="nav-link active"><i class="far fa-circle nav-icon"></i><p>Tabel</p></a></li><li class="nav-item"><a href="/datasensor-grafik" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Grafik</p></a></li></ul></li>';
</script>
@endsection