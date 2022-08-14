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
                        <h3 class="card-title">Kolam</h3>
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                        <form>
                            <div class="card-body" style="padding-top: 2%;">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kolam</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Area</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                    </div>
                    </form>
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
    document.getElementById("kolam").innerHTML = '<a href="/kolam" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Kolam</p></a>';
</script>
@endsection