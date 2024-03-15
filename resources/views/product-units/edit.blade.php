@extends('layouts.master')
@section('title', 'Cập nhật đơn vị sản phẩm')
@section('title-content', 'Cập nhật đơn vị sản phẩm')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product-units.update',$data->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Họ tên<span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Họ và tên">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Mô tả</label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="description"
                                                   value="{{ $data->description }}" placeholder="Họ và tên">
                                        </div>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('product-units.index') }}"
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
