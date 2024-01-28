@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All User Information</h3>
                </div>
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit User Form</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted text-success">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Name</label>
                                <div class="col-md-9">
                                    <input class="form-control " value="{{$user->name}}" name="name" placeholder="User Name" type="text">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{$user->email}}" name="email" placeholder="User Email" type="email">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Mobile</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{$user->mobile}}" name="mobile" placeholder="User Mobile" type="number">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="Password" placeholder="User Password" type="password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="email" class="col-md-3 form-label">User Image</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="profile_photo_path" type="file">
                                    <img src="{{asset($user->profile_photo_path)}}" alt="" height="100" width="80">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update User Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection




