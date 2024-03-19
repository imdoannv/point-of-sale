@extends('layouts.master')
@section('title', 'Thêm mới kho')
@section('title-content', 'Thêm mới kho')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('warehouses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tên kho</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Điền tên kho" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Số điện thoại</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="phone" placeholder="Điền số điện thoại" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Địa chỉ</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="address" placeholder="Điền địa chỉ" value="{{ old('address') }}">
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Thêm mới</button>
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

