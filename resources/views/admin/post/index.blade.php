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
                            <h3 class="card-title">Post list</h3>
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
                               
                                @foreach ($posts as $post)

                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td><img src="{{ $post->image }}" alt=""></td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        {{ $post->category_id }}
                                    </td>
                                    <td>
                                        {{ $post->tag_id }}
                                    </td>
                                    <td>
                                        {{ $post->user_id }}
                                    </td>
                                    <td>
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                    </td>
                                    <td class=" d-flex">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('post.edit', $post->id) }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm mr-1" type="submit" ><i class="fa fa-trash"></i></button>
                                        </form> 

                                        {{-- <a class="btn btn-success btn-sm mr-1" href="#"><i class="fa fa-eye"></i></a> --}}
                                    </td>
                                </tr>

                                @endforeach
                                     
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

 
@endsection
