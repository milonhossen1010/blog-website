@extends('layouts.admin')
@section('name', 'Post Create')
@section('main')



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create</h3>
                            <a class="btn btn-primary" href="{{ route('post.index') }}"> <i
                                    class="fas fa-long-arrow-alt-left"></i> Back to post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class=" col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">

                                <form action="{{ route('post.store') }}" method="POST">
                                    @csrf
                                    @include('inc.validation')
                                    <div class="form-group">
                                        <label for="name">Post Title</label>
                                        <input name="title" type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select class="select-category form-control" name="categories[]" multiple="multiple">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group " >
                                        <label>Tags</label>
                                        <select class="form-control select-tag" name="tags[]" multiple="multiple">
                                          
                                          @foreach ($tags as $tag)
                                          <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                                          @endforeach
                                            
                                        </select>
                                      </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description"
                                            placeholder="Description" rows="4"></textarea>

                                    </div>

                                    <!-- /.card-body -->

                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->


            </div>
        </div>
    </div><!-- /.card -->
</div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <style>
        .select2-container .select2-search--inline .select2-search__field {height: 24px !important;}
    </style>
@endsection

@section('script')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            //Select category function
            $('.select-category').select2({
                placeholder: 'Select category',
                theme: "classic", 
                allowClear: true
            });

            //Select tag function
            $('.select-tag').select2({
                placeholder: 'Select tag',
                theme: "classic", 
            });
        });

    </script>
@endsection
