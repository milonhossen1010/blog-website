@extends('layouts.admin')
@section('name', 'User')
@section('main')



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->photo }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-justify">{{ Auth::user()->bio }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="#settings"
                                    data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane active" id="activity">

                            @foreach (Auth::user()->posts->take(5) as $post)
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{ $post->image }}" alt="Post image">
                                        <span class="username">
                                            <a target="_blank" href="{{ route('frontend.post.single', $post->slug) }}">{{ $post->title }}</a>
                                            {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                                        </span>
                                        <span class="description">{{ date('d  F,  Y', strtotime($post->created_at)) }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                       {{ $post->description }}
                                    </p>  
                                </div>
                                <!-- /.post -->
                            @endforeach




                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane " id="settings">


                                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                    action="{{ route('user.update', Auth::user()->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name"
                                                name="name" value="{{ Auth::user()->name }}">
                                                @error('name')
                                                <span class="text-danger" role="alert">
                                                 {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                                name="email" value="{{ Auth::user()->email }}">
                                                @error('email')
                                                <span class=" text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Photo</label>
                                        <div class="col-sm-10">
                                            <input class="dropify" style="display: block" type="file" name="photo"
                                            value="{{ Auth::user()->photo }}">
                                            {{-- <input type="file" class="dropify form-control" id="inputName2" placeholder="Name" name="photo"> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Bio</label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" class="form-control" rows="4" id="inputExperience"
                                                placeholder="Descripton">{{ Auth::user()->bio }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="inputSkills"
                                                placeholder="Password" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->





@endsection

@section('style')
<!-- Dropify -->
<link rel="stylesheet" href="{{ asset('admin/css/dropify.min.css') }}">
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






        $('.dropify').dropify({

            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            },
            tpl: {
                preview: '<div class="dropify-preview" style="display:block"><span class="dropify-render"><img src="{{ Auth::user()->photo }}" ></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
            }
        });


    });

</script>
@endsection
