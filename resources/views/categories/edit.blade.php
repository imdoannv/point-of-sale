@extends('layouts.master')
@section('title', 'Cập nhật thông tin người dùng')
@section('title-content', 'Cập nhật thông tin người dùng')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Tên danh mục</label>

                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Tên danh mục">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Cập nhật ảnh danh mục</label>
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
                                                   value="{{ $data->description }}" placeholder="Mô tả">
                                        </div>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('categories.index') }}"
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
