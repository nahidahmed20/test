@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Category Information</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">SL NO</th>
                                <th class="wd-15p border-bottom-0 text-center">Name</th>
                                <th class="wd-20p border-bottom-0 text-center">Description</th>
                                <th class="wd-15p border-bottom-0 text-center">Image</th>
                                <th class="wd-10p border-bottom-0 text-center">Status</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$category->name}}</td>
                                <td class="text-center">{{$category->description}}</td>
                                <td class="text-center"><img src="{{asset($category->image)}}" alt="" height="50" width="60"></td>
                                <td class="text-center">{{$category->status}}</td>
                                <td class="text-center">
                                    <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete..')">
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
