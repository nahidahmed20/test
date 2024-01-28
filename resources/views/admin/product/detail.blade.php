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
                <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Product ID</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Sub Category</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>{!! $product->long_description !!}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td><img src="{{asset($product->image)}}" alt="" height="60" width="80"></td>
                    </tr><tr>
                        <th>Product Other Image</th>
                        <td>
                            @foreach($product->otherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="" height="50" width="60">
                            @endforeach
                        </td>
                    </tr>
                    </tr><tr>
                        <th>Product Status</th>
                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection


