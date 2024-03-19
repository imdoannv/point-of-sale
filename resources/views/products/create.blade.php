@extends('layouts.master')
@section('title', 'Thêm mới sản phẩm')
@section('title-content', 'Thêm mới sản phẩm')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tên sản phẩm</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Tên sản phẩm" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Giá</label><span class="text-danger">*</span></div>
                                            <input type="number" id="simpleinput" class="form-control" name="price" placeholder="Giá sản phẩm" value="{{ old('price') }}">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Số lượng</label><span class="text-danger">*</span></div>
                                            <input type="number" id="simpleinput" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <label for="example-fileinput" class="form-label">Ảnh sản phẩm</label>
                                                    <input type="file" style="" class="form-control" name="image" accept="image/*" id="image-input" value="{{ old('image') }}">
                                                </div>
                                            </div>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Mô tả</label></div>
                                            <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Mô tả sản phẩm" value="{{ old('description') }}">
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Danh mục sản phẩm</label>
                                            </div>
                                            <select class="form-select" name="category_id">
                                                @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('category_id') ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Đơn vị sản phẩm</label>
                                            </div>
                                            <select class="form-select" name="product_unit_id">
                                                @foreach ($product_units as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('product_unit_id') ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Kho hàng</label>
                                            </div>
                                            <select class="form-select" name="warehouse_id">
                                                @foreach ($warehouses as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('warehouse_id') ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div> <!-- end col -->
                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Thêm mới</button>
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

