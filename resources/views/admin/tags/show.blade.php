@extends('admin.layouts.main')

@section('content')
    <!-- Preloader -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex">
                        <h1 class="m-0 mr-2">{{ $tag->title }}</h1>
                        <a href=" {{ route('tag.edit', $tag->id) }} " class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('tag.delete', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger border-0 bg-transparent"><i class="fas fa-trash"></i></button>
                        </form>
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
            <div class="container-fluid row">



                <!-- /.row -->
                <div class="card mt-3 col-6">


                    <div class="card-body table-responsive p-0 ">
                        <table class="table table-hover text-nowrap">

                            <tbody>


                                <tr>
                                    <td>ID</td>

                                    <td>{{ $tag->id }}</td>

                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $tag->title }}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- ./wrapper -->
@endsection
