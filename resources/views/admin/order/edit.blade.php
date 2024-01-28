@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Edit Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin-order.update',['id' => $order->id])}}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3">Customer Info</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{isset($order->customer->name) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Order Total</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$order->order_total}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Select Courier</label>
                            <div class="col-md-9">
                                <select name="courier_id" class="form-control">
                                    <option value="" >--Select Courier--</option>
                                    <option value="1" @selected($order->order_status =='1')>SA Paribahan </option>
                                    <option value="2" @selected($order->order_status =='2')>Sundarban</option>
                                    <option value="3" @selected($order->order_status =='3')>I-Xpress</option>
                                    <option value="4" @selected($order->order_status =='4')>Minhaz</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Order Status</label>
                            <div class="col-md-9">
                                <select name="order_status" class="form-control">
                                    <option value="">--Select Order Status--</option>
                                    <option value="Pending" @selected($order->order_status =='Pending')>Pending </option>
                                    <option value="Processing" @selected($order->order_status =='Processing')>Processing</option>
                                    <option value="Complete" @selected($order->order_status =='Complete')>Complete</option>
                                    <option value="Cancel" @selected($order->order_status =='Cancel')>Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="Update Order Status">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection


