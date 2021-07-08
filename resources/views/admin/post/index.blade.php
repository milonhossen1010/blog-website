@extends('layouts.admin')
@section('name', 'Post')
@section('main')



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title ">Post list</h3>
                            <a class="btn btn-primary" href="{{ route('post.create') }}"><i class="fas fa-plus"></i>
                                Create post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($posts->count())
                               
                           

                                <tr v-for="(post,index) in posts.all">
                                    <td v-html="index+1"></td>
                                    <td><img :src="post.image" alt="" style="height: 50px; width:80px"></td>
                                    <td v-html="post.title"></td>
                                    <td >
                                        <span class=" badge badge-secondary mr-1" v-for="category in post.categories" v-html="category.name"></span>
                                    </td>
                                    <td>
                                        <span class=" badge badge-primary mr-1" v-for="tag in post.tags" v-html="tag.name"></span>
                                    </td>
                                    <td v-html="post.user.name">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch"> 
                                              <input @click="statusPost(post.id)" type="checkbox" class="custom-control-input" :id="post.id" v-model="post.status" >
                                              <label class="custom-control-label" :for="post.id"></label>
                                            </div>
                                          </div>
                                    </td>
                                    <td class=" d-flex">
                                        <a @click="editFunction(post.id, $event)" class="btn btn-primary btn-sm mr-1" href="#"><i class="fa fa-edit"></i></a>
                                        <a @click="deletePost(post.id, $event)" class="btn btn-danger btn-sm mr-1" href="#"><i class="fa fa-trash"></i></a>
                                        

                                        {{-- <a class="btn btn-success btn-sm mr-1" href="#"><i class="fa fa-eye"></i></a> --}}
                                    </td>
                                </tr>

                                     
                                @else
                                    <tr>
                                        <td colspan="8"><h4 class=" text-center">No post found.</h4></td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->


                </div>
            </div>
        </div><!-- /.card -->
    </div>
</div>


<!-- /.modal -->

<div class="modal fade2 " id="postEditModal">
    <div  class="modal-dialog modal-xl modal-dialog-centered animate__animated animate__zoomIn">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

 
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