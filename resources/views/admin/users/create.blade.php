@extends('admin.layouts.main')

@section('content')
    <!-- Preloader -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                create User

                <!-- /.row -->
                <form action="{{ route('user.store') }}" method="POST">

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of User</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                placeholder="Name of User">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control"
                                placeholder="Email">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input value="{{ old('password') }}" type="password" name="password" class="form-control"
                                placeholder="password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Choose Role</label>
                            <select name="role" class="form-control">

                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}" {{ $id == old('role_id') ? ' selected ' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        @error('role')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>

                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- ./wrapper -->
@endsection
