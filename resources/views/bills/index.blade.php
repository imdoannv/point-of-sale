@extends('layouts.master')
@section('title', 'Danh sách hóa đơn')
@section('title-content', 'Danh sách hóa đơn')
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
                                            <th>Bàn</th>
                                            <th>Khách hàng</th>
                                            <th>Nhân viên</th>
                                            <th>Mã giảm giá</th>
                                            <th>Số tiền thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value -> id }}</td>

                                                <td>
                                                    @isset($value->tables->name)
                                                        {{ $value->tables->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->customers->name)
                                                        {{ $value->customers->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->users->name)
                                                        {{ $value->users->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->discounts->name)
                                                        {{ $value->discounts->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>{{$value->total_price}}</td>

                                                <td>
                                                    @if($value->status == 'paid')
                                                        Đã thanh toán
                                                    @elseif($value->status == 'cancelled')
                                                        Đã hủy/ Không còn hiệu lực
                                                    @elseif($value->status == 'pending')
                                                        Đang chờ xử lý
                                                    @elseif($value->status == 'shipped')
                                                        Giao hàng
                                                    @elseif($value->status == 'refunded')
                                                        Hoàn trả
                                                    @endif
                                                </td>

                                                <td class="grid grid-cols-6 gap-3">
                                                    <a class="btn btn-primary" href="{{ route('bill-details.index') }}">Chi tiết</a>
{{--                                                    <a href="{{ route('bill-details.show', $value->id) }}">--}}
{{--                                                        <button type="submit" class="btn btn-primary text-center">--}}
{{--                                                            Chi tiết--}}
{{--                                                        </button>--}}
{{--                                                    </a>--}}
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
