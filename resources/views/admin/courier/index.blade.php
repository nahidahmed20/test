@extends('admin.master')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Courier Information</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">SL NO</th>
                                <th class="wd-15p border-bottom-0 text-center">Name</th>
                                <th class="wd-20p border-bottom-0 text-center">Mobile</th>
                                <th class="wd-15p border-bottom-0 text-center">Email</th>
                                <th class="wd-15p border-bottom-0 text-center">Cost</th>
                                <th class="wd-10p border-bottom-0 text-center">Address</th>
                                <th class="wd-25p border-bottom-0 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($couriers as $courier)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$courier->name}}</td>
                                    <td class="text-center">{{$courier->mobile}}</td>
                                    <td class="text-center">{{$courier->email}}</td>
                                    <td class="text-center">{{$courier->cost}}</td>
                                    <td class="text-center">{{$courier->address}}</td>
                                    <td class="text-center ">
                                        <a href="{{route('courier.edit',$courier->id)}}" class="btn btn-success ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('courier.destroy',$courier->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete..')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

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

