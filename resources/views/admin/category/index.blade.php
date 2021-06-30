@extends('layouts.admin')
@section('name', 'Category')
@section('main')



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Category list</h3>
                            <a class="btn btn-primary" href="{{ route('category.create') }}"><i class="fas fa-plus"></i>
                                Create category</a>
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

                                @foreach ($categories as $category)

                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {{ $category->slug }}
                                    </td>
                                    <td><span class="badge bg-danger">{{ $category->id }}</span></td>
                                    <td class=" d-flex">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm mr-1" type="submit" ><i class="fa fa-trash"></i></button>
                                        </form> 

                                        {{-- <a class="btn btn-success btn-sm mr-1" href="#"><i class="fa fa-eye"></i></a> --}}
                                    </td>
                                </tr>

                                @endforeach

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
