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
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.update',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id"  class="form-control" onchange="getSubCategoryByCategory(this.value)">
                                    <option value="">--Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="sub_category_id" id="subCategoryId" class="form-control" >
                                    <option value="">--Select Sub Category--</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" @selected($sub_category->id == $product->sub_category_id)>{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" id="" class="form-control" >
                                    <option value="">--Select Brand--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @selected($brand->id == $product->brand_id)>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select name="unit_id" id="" class="form-control" >
                                    <option value="">--Select Unit--</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" @selected($unit->id == $product->unit_id)>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$product->name}}" placeholder="Product Name" type="text" name="name">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName1" value="{{$product->code}}" placeholder="Product Code" type="text" name="code">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="firstName1" placeholder="Product Short Description" type="text" name="short_description">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" placeholder="Product Long Description" type="text" name="long_description">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input class="form-control"  placeholder="Regular Price" value="{{$product->regular_price}}" type="number" name="regular_price">
                                    <input class="form-control"  placeholder="selling Price" value="{{$product->selling_price}}" type="number" name="selling_price">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName1" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName1" value="{{$product->stock_amount}}" placeholder="Stock Code" type="number" name="stock_amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="image" type="file">
                                <img src="{{asset($product->image)}}" alt="" height="50" width="70">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="other_image[]" type="file" multiple>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="" height="50" width="60">
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" value="1" {{$product->satus == 1 ? 'checked' : ''}} checked>Published</label>
                                <label><input type="radio" name="status" value="0" {{$product->satus == 0 ? 'checked' : ''}}>Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


