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
                Edit Post

                <!-- /.row -->
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name of Post</label>
                            <input type="text" name="title" class="form-control"placeholder="Name of Post"
                                value="{{ $post->title }}">
                            @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Summernote
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="summernote" name="content">
                                {{ $post->content }}
                              </textarea>
                                </div>

                            </div>
                        </div>
                        @error('content')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- /.col-->
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Preview image</label>

                        <div class="w-25">
                            <img src=" {{ url('storage/', $post->preview_image) }} " class="w-25" alt="preview_image">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                <label class="custom-file-label" for="exampleInputFile">Preview image</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('preview_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputFile">Main image</label>
                        <div class="w-25 mb-2">
                            <img src=" {{ url('storage/', $post->main_image) }} " class="w-25" alt="main_image">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                <label class="custom-file-label" for="exampleInputFile">Main Image</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('main_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Choose Category</label>
                        <select name="category_id" class="form-control">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? ' selected ' : '' }}>{{ $category->title }}
                                </option>
                            @endforeach

                        </select>
                        @error('main_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Choose Tags"
                            style="width: 100%;">

                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    @foreach ($post->tags as $postTag)
                                  
                                    @if ($tag->id == $postTag->id)
                                    
                                        {{ ' selected ' }}
                                    @endif @endforeach>
                                    {{ $tag->title }}</option>
                            @endforeach

                        </select>
                        @error('main_image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
