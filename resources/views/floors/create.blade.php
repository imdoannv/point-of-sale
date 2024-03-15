@extends('layouts.master')
@section('title', 'Thêm mới tầng')
@section('title-content', 'Thêm mới tầng')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('floors.store') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Tên tầng</label><span class="text-danger">*</span></div>
                                            <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Điền tên tầng" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex gap-1">
                                                <label for="simpleinput" class="form-label">Số lượng bàn/tầng<span class="text-danger">*</span></label></div>
                                            <input type="number" id="simpleinput" class="form-control" name="quantity" placeholder="Điền số lượng bàn" value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                                <button class="btn btn-primary waves-effect waves-light">Thêm mới</button>
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

