@extends('layouts.master')
@section('title', 'Cập nhật tầng')
@section('title-content', 'Cập nhật tầng')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('floors.update',$data->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type='hidden' value="{{ $data->id }}" name="id">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Tên tầng<span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="name"
                                                   value="{{ $data->name }}" placeholder="Họ và tên">
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label class="form-label">Số lượng bàn/ tầng <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" id="simpleinput" class="form-control" name="quantity"
                                                   value="{{ $data->quantity }}" placeholder="Họ và tên">
                                        </div>
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div> <!-- end col -->


                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                <a href="{{ route('floors.index') }}"
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
