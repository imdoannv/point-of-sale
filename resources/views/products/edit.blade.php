@extends('layouts.master')
@section('title', 'Cập nhật thông tin sản phẩm')
@section('title-content', 'Cập nhật thông tin sản phẩm')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('products.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <input type='hidden' value="{{ $data->password }}" name="password">
                                <input type='hidden' value="{{ $data->role }}" name="role">
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Họ tên</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Họ và tên">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Giá</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="number" id="simpleinput" class="form-control" name="price"
                                                   value="{{ $data->price }}" placeholder="Nhập giá sản phẩm">
                                        </div>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Số lượng</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="number" id="simpleinput" class="form-control" name="quantity"
                                                   value="{{ $data->quantity }}" placeholder="Nhập số lượng sản phẩm">
                                        </div>
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Cập nhật ảnh sản phẩm</label>
                                            <input type="file" class="form-control" accept="image/*" id="image-input"
                                                   name="new_image">
                                        </div>
                                        @if ($data->image)
                                            <input type="text" value="{{ $data->image }}" name="old_image" hidden>
                                            <div class="mb-3">
                                                <img style="width:80px;height:80px;border-radius:50%" id="show-image"
                                                     src="{{ asset($data->image) }}" alt="">
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Mô tả</label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="description"
                                                   value="{{ $data->description }}" placeholder="Nhập giá sản phẩm">
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Thông tin danh mục</label></div>
                                            <select class="form-select" name="category_id">
                                                @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data->category_id == $value->id ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Đơn vị sản phẩm</label></div>
                                            <select class="form-select" name="product_unit_id">
                                                @foreach ($product_units as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data->product_unit_id == $value->id ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Kho hàng</label></div>
                                            <select class="form-select" name="warehouse_id">
                                                @foreach ($warehouses as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data->warehouse_id == $value->id ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('products.index') }}"
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
