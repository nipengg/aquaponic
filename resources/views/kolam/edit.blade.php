@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ $pool->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Kolam</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('kolam.update', $pool->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Kolam</label>
                        <input autocomplete="off" type="text" class="form-control" id="name" name="name" value="{{ $pool->name }}" placeholder="Nama Kolam" required>
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <input type="number" class="form-control" id="area" name="area" value="{{ $pool->area }}" placeholder="Area(m)" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea id="desc" name="desc" class="form-control" rows="3" placeholder="Description" required>{{ $pool->desc }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </section>
    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Kolam";
        document.getElementById("kolam").innerHTML =
            '<a href="/kolam" class="nav-link active"><i class="nav-icon fas fa-tint"></i><p>Kolam</p></a>';
    </script>
@endsection
