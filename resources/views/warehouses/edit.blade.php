@extends('layouts.master')
@section('title', 'Cập nhật thông tin kho')
@section('title-content', 'Cập nhật thông tin kho')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('warehouses.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Tên kho</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Tên danh mục">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Số điện thoại</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="phone"
                                                   value="{{ $data->phone }}" placeholder="Xin nhập số điện thoại">
                                        </div>
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Địa chỉ</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="address"
                                                   value="{{ $data->address }}" placeholder="Nhập địa chỉ">
                                        </div>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('warehouses.index') }}"
                                   class="btn btn-warning waves-effect text-light">Trở về</a>
                            </form>
                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>

        </div> <!-- container -->

    </div>
@endsection
