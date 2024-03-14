@extends('layouts.master')
@section('title', 'Cập nhật thông khách hàng')
@section('title-content', 'Cập nhật thông khách hàng')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('customers.update',$data->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Họ tên</label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Họ và tên">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Số điện thoại</label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="phone"
                                                   value="{{ $data->phone }}" placeholder="Họ và tên">
                                        </div>
                                        @error('phone')
                                             <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Email</label>
                                            </div>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Email" value="{{ $data->email }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Điểm thưởng</label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="points"
                                                   value="{{ $data->points }}" placeholder="Họ và tên">
                                        </div>
                                        @error('points')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('customers.index') }}"
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
