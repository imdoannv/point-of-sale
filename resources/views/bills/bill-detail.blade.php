@extends('layouts.master')
@section('title', 'Chi tiết hóa đơn')
@section('title-content', 'Chi tiết hóa đơn')
@section('content')
    <div class="content mt-8">
        <!-- Start Content-->
        <div class="container-fluid mt-8">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <div class="mb-2 d-flex gap-1 ">
{{--                                        <a class="btn btn-success" href="{{ route('bills.create') }}">Thêm mới</a>--}}
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã hóa đơn</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tiền</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    @isset($value->bills->id)
                                                        {{ $value->bills->id }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->products->name)
                                                        {{ $value->products->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->products->image)
                                                        <img src="{{ asset($value->products->image) }}" alt="" style="width: 80px; height: 80px">
                                                    @else
                                                        <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 80px; height: 80px">
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->products->price)
                                                        {{ number_format($value->products->price)  }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>{{$value->quantity}}</td>

                                                <td>{{ number_format($value->price)}}</td>


                                                <td class="grid grid-cols-6 gap-3">
                                                    <a class="btn btn-primary" href="{{ route('bills.index') }}">Quay lại</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                 <span class="text-right">   {{ $data->links() }}</span>
                                </div> <!-- end .table-responsive-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
