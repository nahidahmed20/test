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
                <li class="breadcrumb-item active" aria-current="page">Edit Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Courier Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('courier.update',$courier->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Courier Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$courier->name}}" placeholder="Courier Name" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Courier Phone</label>
                            <div class="col-md-9">
                                <input class="form-control" name="mobile" value="{{$courier->mobile}}" placeholder="Courier Mobile" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Courier Email</label>
                            <div class="col-md-9">
                                <input class="form-control" name="email" value="{{$courier->email}}" placeholder="Courier Email" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Courier Cost</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cost" value="{{$courier->cost}}" placeholder="Courier Cost" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Courier Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address"   placeholder="Courier Description" type="text">{{$courier->address}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" value="1" {{$courier->status ==1 ? 'checked' : ''}} checked>Published</label>
                                <label><input type="radio" name="status" value="0" {{$courier->status ==0 ? 'checked' : ''}}>Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Courier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

