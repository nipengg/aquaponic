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

                                <div class="container-fluid mt-5" style="padding:0 30px 0 30px">
                                    <div id="date_filter" class="row">
                                        <input value="{{ $from }}" type="date" id="min" name="min"
                                            class="form-control col-sm" /> &nbsp; &nbsp;
                                        To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max"
                                            name="max" class="form-control col-sm" /> &nbsp; &nbsp;
                                        <button onclick="handleDateChange()" type="button"
                                            class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
                                        <button type="button" onclick="handleSelectChange()" class="btn btn-danger col-sm">
                                            Clear Filter</a>
                                    </div>
                                </div>
                                {{-- <div id="date_filter" class="row">
                                    <input value="{{ $from }}" type="date" id="min" name="min"
                                        class="form-control col-sm" /> &nbsp; &nbsp;
                                    To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max"
                                        name="max" class="form-control col-sm" /> &nbsp; &nbsp;
                                    <button onclick="handleDateChange()" type="button"
                                        class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
                                    <button type="button" onclick="handleSelectChange()" class="btn btn-danger col-sm">
                                        Clear Filter</a>
                                </div> --}}

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
                                        <th>Average</th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->temper_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->ph_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->humidity_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->oxygen_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->tds_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
                                        <th>
                                            <?php
                                            $sum = 0;
                                            foreach ($data as $item) {
                                                $sum = $sum + $item->turbidities_val;
                                            }
                                            ?>
                                            {{ number_format($sum / $count, 1) }}
                                        </th>
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

        function handleSelectChange(event) {
            window.location.href = "{{ url('/datasensor/table/?pool=') }}" + $("#pilihKolam").val();
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor/table/?pool=') }}" + $("#pilihKolam").val() + ('&from=') + min + (
                '&to=') + max;
        };
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                order: [
                    [0, 'desc']
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        
        document.getElementById("menuAktif").innerHTML =
            '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><li id="beranda" class="nav-item"><a href="/home" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Beranda</p></a></li><li class="nav-item menu-open"><a href="#" class="nav-link active"><i class="nav-icon fas fa-chart-pie"></i><p>Data Sensor<i class="right fas fa-angle-left"></i></p></a><ul class="nav nav-treeview"><li class="nav-item"><a href="/datasensor/table" class="nav-link active"><i class="far fa-circle nav-icon"></i><p>Tabel</p></a></li><li class="nav-item"><a href="/datasensor/grafik" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Grafik</p></a></li></ul></li><li id="kolam" class="nav-item"><a href="/kolam" class="nav-link"><i class="nav-icon fas fa-tint"></i><p>Kolam</p></a></li>@if (Auth::user()->role == 'admin')<li id="user" class="nav-item"><a href="/admin/user" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Manage User</p></a></li>@endif</ul>';

    </script>
@endsection
