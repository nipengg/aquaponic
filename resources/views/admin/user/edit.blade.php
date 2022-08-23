@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ $user->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input autocomplete="off" type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Nama Kolam" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Status</label>
                        <select class="form-control" id="role" name="role">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="inactive" {{ $user->role == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Phone</label>
                        <input type="number" name="phone" class="form-control" rows="3" placeholder="Phone" value="{{ $user->phone }}" required>
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
        document.getElementById("TopTitle").innerHTML = "Manage User";
        document.getElementById("user").innerHTML =
            '<a href="/admin/user" class="nav-link active"><i class="nav-icon fas fa-user-alt"></i><p>Manage User</p></a>';
    </script>
@endsection
