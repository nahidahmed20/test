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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order ID</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($orders as $order)
                            <tbody>
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <a href="">Details</a>
                                </td>

                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


