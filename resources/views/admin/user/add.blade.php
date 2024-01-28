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
                <li class="breadcrumb-item active" aria-current="page">Manage User</li>
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
                        <h3 class="card-title">Add User Form</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted text-success">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name" required placeholder="User Name" type="text">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="email" required placeholder="User Email" type="email">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Mobile</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="mobile" required placeholder="User Mobile" type="number">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">User Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" required name="Password" placeholder="User Password" type="password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="email" class="col-md-3 form-label">User Image</label>
                                <div class="col-md-9">
                                    <input class="form-control"  name="profile_photo_path" type="file">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection



