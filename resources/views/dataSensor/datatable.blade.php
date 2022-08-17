@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Table Data</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Kolam</label>
                        <select id="pilihKolam" onchange="handleSelectChange()" class="form-control select2"
                            style="width: 100%;">

                            @foreach ($kolam as $key)
                                <option value="{{ $key->id }}" {{ $id == $key->id ? 'selected' : '' }}>
                                    {{ $key->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Table</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Data Kolam</p>
                            <div class="float-right">
                                <div id="date_filter" class="row">
                                    <input value="{{ $from }}" type="date" id="min" name="min"
                                        class="form-control col-sm" /> &nbsp; &nbsp;
                                    To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max" name="max"
                                        class="form-control col-sm" /> &nbsp; &nbsp;
                                    <button onclick="handleDateChange()" type="button"
                                        class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
                                    <button type="button" onclick="handleSelectChange()" class="btn btn-danger">
                                        Clear Filter</a>
                                </div>
                            </div>
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
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->temper_val }}</td>
                                            <td>{{ $item->ph_val }}</td>
                                            <td>{{ $item->humidity_val }}</td>
                                            <td>{{ $item->oxygen_val }}</td>
                                            <td>{{ $item->tds_val }}</td>
                                            <td>{{ $item->turbidities_val }}</td>
                                        </tr>
                                    @endforeach
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

        function handleSelectChange(event) {
            window.location.href = "{{ url('/datasensor-table/?pool=') }}" + $("#pilihKolam").val();
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor-table/?pool=') }}" + $("#pilihKolam").val() + ('&from=') + min + (
                '&to=') + max;
        };
    </script>
@endsection
