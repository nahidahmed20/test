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
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Order Information</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">SL NO</th>
                                <th class="wd-15p border-bottom-0 text-center">Order Id</th>
                                <th class="wd-15p border-bottom-0 text-center">Order Total</th>
                                <th class="wd-20p border-bottom-0 text-center">Customer Info</th>
                                <th class="wd-15p border-bottom-0 text-center">Order Date</th>
                                <th class="wd-10p border-bottom-0 text-center">Order Status</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$order->id}}</td>
                                    <td class="text-center">{{$order->order_total}}</td>
                                    <td class="text-center">{{ isset($order->customer->name) ? $order->customer->name.'('.$order->customer->mobile.')': ''}}</td>
                                    <td class="text-center">{{$order->order_date}}</td>
                                    <td class="text-center">{{$order->order_status}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin-order.detail',['id' => $order->id])}}" class="btn btn-info btn-sm" title="View Order Detail">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{route('admin-order.edit',['id' => $order->id])}}" class="btn btn-success btn-sm {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin-order.show-invoice',['id' => $order->id])}}" class="btn btn-primary btn-sm" title="Show Order Invoice">
                                            <i class="fa fa-bookmark-o"></i>
                                        </a>
                                        <a href="{{route('admin-order.download-invoice',['id' => $order->id])}}" class="btn btn-warning btn-sm" title="Download Order Invoice" target="_blank">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a href="{{route('admin-order.delete',['id' => $order->id])}}" class="btn btn-danger btn-sm {{$order->order_status == 'Cancel' ? '' : 'disabled'}}"  title="Delete Button"onclick="return confirm('Are you sure to delete..')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection

