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
                            <form action="{{ route('users.update',$data->id) }}" method="POST" enctype="multipart/form-data">
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

                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Họ tên">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Email</label>

                                            </div>
                                            <input type="email" id="example-email" name="email" class="form-control"
                                                   placeholder="Email" value="{{ $data->email }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Cập nhật ảnh đại diện</label>
                                            <input type="file" class="form-control" accept="image/*" id="image-input"
                                                   name="new_avatar">
                                        </div>
                                        @if ($data->avatar)
                                            <input type="text" value="{{ $data->avatar }}" name="old_avatar" hidden>
                                            <div class="mb-3">
                                                <img style="width:80px;height:80px;border-radius:50%" id="show-image"
                                                     src="{{ asset($data->avatar) }}" alt="">
                                                @error('avatar')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif

                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
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
