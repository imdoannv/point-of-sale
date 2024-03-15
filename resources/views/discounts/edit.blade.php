@extends('layouts.master')
@section('title', 'Cập nhật mã giảm giá')
@section('title-content', 'Cập nhật mã giảm giá')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('discounts.update',$data->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tên mã giảm giá</label>
                                            <input type="text" name="name" id="simpleinput" class="form-control"placeholder="Tên mã giảm giá..." value="{{ $data->name }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kiểu </label>

                                            <div class="form-check mb-1">
                                                <input type="radio" name="type"
                                                       value="percent" {{ old('type') == 'percent' || $data->type == 'percent' ? 'checked' : '' }}
                                                       id="genderM" class="form-check-input">
                                                <label for="genderM" class="form-check-label">Phần trăm</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio"
                                                       value="price" {{ old('type') || ($data->type == 'price') == 'price' ? 'checked' : '' }}
                                                       name="type" id="genderF" class="form-check-input">
                                                <label for="genderF" class="form-check-label">Giá tiền</label>
                                            </div>
                                            @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-palaceholder" class="form-label">Giá trị</label>
                                            <input type="text" name="value" id="example-palaceholder" class="form-control"
                                                   placeholder="Giá trị..." value="{{ $data->value }}">
                                            @error('value')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Mô tả</label>
                                            <textarea class="form-control" placeholder="Mô tả..." name="description" id="description" rows="5">{{ $data->description }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-palaceholder" class="form-label">Số lượng</label>
                                            <input type="text" name="quantity" id="example-palaceholder" class="form-control"
                                                   placeholder="Số lượng..." value="{{ $data->quantity }}">
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-disable" class="form-label">Ngày bắt đầu</label>
                                            <input type="datetime-local" name="start_date" class="form-control"
                                                   value="{{ $data->start_date }}">
                                            @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-disable" class="form-label">Ngày kết thúc</label>
                                            <input type="datetime-local" name="end_date" class="form-control"
                                                   value="{{ $data->end_date }}">
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('discounts.index') }}"
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
