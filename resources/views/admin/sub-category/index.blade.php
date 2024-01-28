@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Sub Category Information</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">SL NO</th>
                                <th class="wd-15p border-bottom-0 text-center">Category Name</th>
                                <th class="wd-20p border-bottom-0 text-center">Name</th>
                                <th class="wd-15p border-bottom-0 text-center">Description</th>
                                <th class="wd-10p border-bottom-0 text-center">Image</th>
                                <th class="wd-25p border-bottom-0 text-center">Status</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$sub_category->category->name}}</td>
                                <td class="text-center">{{$sub_category->name}}</td>
                                <td class="text-center">{{$sub_category->description}}</td>
                                <td class="text-center"><img src="{{asset($sub_category->image)}}" alt="" height="50" width="60"></td>
                                <td class="text-center">{{$sub_category->status}}</td>
                                <td class="text-center">
                                    <a href="{{route('sub-category.edit',['id' => $sub_category->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('sub-category.delete',['id' => $sub_category->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete..')">
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

