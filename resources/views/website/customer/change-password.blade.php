@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">

                @include('website.customer.sidebar-menu')

                <div class="col-lg-9">
                    <div class="card card-body">
                        <h5 class="text-danger">{{session('message')}}</h5>
                        <form action="{{route('customer.update-password')}}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3">Current Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3">New Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3">Confirm New Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-success">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection



