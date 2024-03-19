@extends('layouts.master')
@section('title', 'Thêm bàn mới')
@section('title-content', 'Thêm bàn mới')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('tables.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tên bàn</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Tên bàn" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Sức chứa người/bàn</label><span class="text-danger">*</span></div>
                                            <input type="number" id="simpleinput" class="form-control" name="capacity" placeholder="Sức chứa người/bàn" value="{{ old('capacity') }}">
                                            @error('capacity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Trạng thái</label>
                                            <select class="form-select" id="example-select" name="status">
                                                <option value="available">Trống</option>
                                                <option value="occupied">Đang sử dụng</option>
                                                <option value="reserved">Đã đặt</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tầng</label>
                                            </div>
                                            <select class="form-select" name="floor_id">
                                                @foreach ($floors as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('floor_id') ? 'selected' : false }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div> <!-- end col -->
                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Thêm mới</button>
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

