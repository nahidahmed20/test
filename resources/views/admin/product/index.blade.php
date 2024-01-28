@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Information</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">SL NO</th>
                                <th class="wd-15p border-bottom-0 text-center">Name</th>
                                <th class="wd-15p border-bottom-0 text-center">Code</th>
                                <th class="wd-15p border-bottom-0 text-center">Image</th>
                                <th class="wd-10p border-bottom-0 text-center">Stock</th>
                                <th class="wd-10p border-bottom-0 text-center">Status</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td class="text-center">{{$product->code}}</td>
                                    <td class="text-center"><img src="{{asset($product->image)}}" alt="" height="50" width="60"></td>
                                    <td class="text-center">{{$product->stock_amount}}</td>
                                    <td class="text-center">{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('product.detail',['id' => $product->id])}}" class="btn btn-success">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{route('product.edit',['id' => $product->id])}}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete..')" onclick="return confirm('Are you sure to delete..')">
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

