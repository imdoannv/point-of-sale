@extends('layouts.master')
@section('title', 'Thêm mới người dùng')
@section('title-content', 'Thêm mới người dùng')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Họ tên</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Họ tên" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="example-email" class="form-label">Email</label><span class="text-danger">*</span></div>
                                            <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="password" class="form-label">Mật khẩu</label><span class="text-danger">*</span></div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn">

                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>

                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-lg-6">

                                        <div class="mb-3">

                                            <div class="d-flex gap-2">
                                                <div>
                                                    <label for="example-fileinput" class="form-label">Ảnh đại diện</label>
                                                    <input type="file" style="" class="form-control" name="avatar" accept="image/*" id="image-input" value="{{ old('avatar') }}">
                                                </div>
                                                <div class="mb-3 mt-3" style="text-align:center;">
                                                    <img src="" style="width: 70px;min-height:70px;border-radius:100% ;     object-fit: cover;"
                                                         id="show-image" alt="">
                                                </div>
                                            </div>
                                            @error('avatar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Thêm mới</button>
                                <a href="{{ route('users.index') }}"
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

