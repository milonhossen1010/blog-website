@extends('layouts.admin')
@section('name', 'Category Edit')
@section('main')



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit</h3>
                            <a class="btn btn-primary" href="{{ route('category.index') }}"> <i class="fas fa-long-arrow-alt-left"></i> Back to category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class=" col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">

                                <form action="{{ route('category.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @include('inc.validation')
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            value="{{ $category->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description"
                                            placeholder="Description" rows="4">{{ $category -> description }}</textarea>

                                    </div>

                                    <!-- /.card-body -->

                                    <div>
                                        <button type="submit" class="btn btn-primary">Update Category</button>
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
