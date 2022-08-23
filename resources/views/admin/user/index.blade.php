@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Approval</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                @if ($user->role == 'inactive')
                                                    <form action="{{ route('user.approve', $user->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success" title="Approve">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('user.unapprove', $user->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" title="Unapprove">
                                                            <i class="fa fa-x"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    Verified Account
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('user.unapprove', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
        document.getElementById("TopTitle").innerHTML = "Manage User";
        document.getElementById("user").innerHTML =
            '<a href="/admin/user" class="nav-link active"><i class="nav-icon fas fa-user-alt"></i><p>Manage User</p></a>';
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
