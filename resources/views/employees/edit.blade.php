@extends('layouts.master')
@section('title', 'Cập nhật thông tin nhân viên')
@section('title-content', 'Cập nhật thông tin nhân viên')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('employees.update',$model->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $model->id }}" name="id">
                                <div class="row">

                                    <div class="mb-3">
                                        <div class="d-flex gap-1">
                                            <label for="simpleinput" class="form-label">Thông tin Email</label><span class="text-danger">*</span></div>
                                        <select class="form-select" name="user_id">
                                            @foreach ($users as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ $model->user_id == $value->id ? 'selected' : false }}>
                                                    {{ $value->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex gap-1">
                                            <label for="" class="form-label">Số điện thoại</label><span class="text-danger">*</span></div>
                                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại"  value="{{ old('phone', $model->phone ?? '') }}">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex gap-1">
                                            <label for="" class="form-label">Lương</label><span class="text-danger">*</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="number" name="salary" class="form-control" placeholder="Nhập số lương" value="{{ old('salary', $model->salary ?? '') }}">
                                            <span class="input-group-text input-unit">VND</span>
                                        </div>
                                        @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex gap-1">
                                            <label for="" class="form-label">Công</label><span class="text-danger">*</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="number" name="timekeeping" class="form-control" placeholder="Nhập số lương" value="{{ old('timekeeping', $model->timekeeping ?? '') }}">
                                            <span class="input-group-text input-unit">Times</span>
                                        </div>
                                        @error('timekeeping')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('employees.index') }}"
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
