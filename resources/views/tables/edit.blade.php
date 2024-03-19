@extends('layouts.master')
@section('title', 'Cập nhật thông bàn')
@section('title-content', 'Cập nhật thông bàn')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('tables.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Tên bàn</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Tên của bàn">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Số lượng người trên bàn</label>
                                                <span class="text-danger">*</span>
                                            </div>
                                            <input type="number" id="simpleinput" class="form-control" name="capacity"
                                                   value="{{ $data->capacity }}" placeholder="Số lượng người trên bàn">
                                        </div>
                                        @error('capacity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror



                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="" name="status">
                                                <option value="available" {{ $data->status === 'available' ? 'selected' : '' }}>Trống</option>
                                                <option value="occupied" {{ $data->status === 'occupied' ? 'selected' : '' }}>Đang sử dụng</option>
                                                <option value="reserved" {{ $data->status === 'reserved' ? 'selected' : '' }}>Đã đặt</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tên tầng</label></div>
                                            <select class="form-select" name="floor_id">
                                                @foreach ($floors as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data->floor_id == $value->id ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('tables.index') }}"
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
