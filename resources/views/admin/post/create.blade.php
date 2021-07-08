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
                            <div class=" col-12 col-md-8  col-lg-12 ">

                                <form class="dropzone" action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Post Title</label>
                                        <input value="{{ old('title') }}" name="title" type="text" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select class="select-category form-control" name="categories[]"
                                            multiple="multiple">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label>Tags</label>
                                        <select class="form-control select-tag" name="tags[]" multiple="multiple">

                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class=" form-group">
                                        <label for="upload-img">
                                            <span>Feature image</span>
                                        </label>
                                        <input class="dropify" style="display: block" type="file" name="image" id="upload-img">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="summernote"
                                            placeholder="Description" rows="4">{{ old('description') }}</textarea>

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
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
<!-- Dropify -->
<link rel="stylesheet" href="{{ asset('admin/css/dropify.min.css') }}">
<!-- Summernote css -->
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

<style>
    .select2-container .select2-search--inline .select2-search__field {
        height: 24px !important;
    }

</style>
@endsection

@section('script')
<!-- Select2 js -->
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<!-- Dropify js -->
<script src="{{ asset('admin/js/dropify.min.js') }}"></script>
<!-- Summernote js -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

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

        //Summernote code
        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Write post description...',
                height: 200,
            });
        });



$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
        

    });

</script>
@endsection
