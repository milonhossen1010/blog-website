@extends('layouts.admin')
@section('name', 'Tag')
@section('main')



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Tag list</h3>
                            <a class="btn btn-primary" href="{{ route('tag.create') }}"><i class="fas fa-plus"></i>
                                Create tag</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Post Count</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($tags->count())
                               
                                @foreach ($tags as $tag)

                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        {{ $tag->slug }}
                                    </td>
                                    <td><span class="badge bg-danger">{{ $tag->id }}</span></td>
                                    <td class=" d-flex">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('tag.edit', $tag->id) }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
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
                                        <td colspan="5"><h4 class=" text-center">No tag found.</h4></td>
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
