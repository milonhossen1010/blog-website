@extends('layouts.admin')
@section('name', 'Tag')
@section('main')



<!-- Main content -->
<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Add Tag</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="tagForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input v-model="tags.name" name="name" type="text" class="form-control"
                                    placeholder="Name">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button @click="addTag($event)" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-8">
                <div class=" card">

                    <div class="card-header">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Tag list</h3>
                            {{-- <a class="btn btn-primary" href="{{ route('tag.create') }}"><i class="fas fa-plus"></i>
                                Create tag</a> --}}
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



                                <tr v-for="(tag, index) in tags.all">
                                    <td v-html="index+1"></td>
                                    <td v-html="tag.name"></td>
                                    <td v-html="tag.slug"></td>
                                    <td><span class="badge bg-danger">dd</span></td>
                                    <td class=" d-flex">
                                        <a @click="editTag(tag.id, $event)" class="btn btn-primary btn-sm mr-1" href="#"><i class="fa fa-edit"></i></a>
                                        <a @click="deleteTag(tag.id, $event)" class="btn btn-danger btn-sm mr-1" href="#"><i class="fa fa-trash"></i></a>
                                       

                                        {{-- <a class="btn btn-success btn-sm mr-1" href="#"><i class="fa fa-eye"></i></a> --}}
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td colspan="5">
                                        <h4 class=" text-center">No tag found.</h4>
                                    </td>
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

<!-- Modal structure -->
<div class="modal " id="tagEditModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tag Edit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="editTagForm">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input v-model="tags.edit.name" name="name" type="text" class="form-control"
                            placeholder="name">
                    </div>
                <!-- /.card-body -->

            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button @click="updateTag()" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
 

@endsection
