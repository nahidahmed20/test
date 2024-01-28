@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Register</h1>
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
                <div class="col-md-6 mx-auto">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" action="{{route('customer-register')}}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="text-black">Full Name:</label>
                                    <input class="form-control" name="name" placeholder="Full Name" type="text" id="reg-fn" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address: </label>
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" id="reg-email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="text-black">Phone Number: </label>
                                    <input class="form-control" type="text" placeholder="Phone Number" name="mobile" id="reg-phone" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password: </label>
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="reg-pass" required>
                                </div>
                            </div>

                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{route('customer-login')}}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

