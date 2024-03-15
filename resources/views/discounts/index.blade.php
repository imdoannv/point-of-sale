@extends('layouts.master')
@section('title', 'Danh sách mã giảm giá')
@section('title-content', 'Danh sách mã giảm giá')
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
                                        <a class="btn btn-success" href="{{ route('discounts.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('discounts-deleted') }}">Thùng rác</a>
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>

                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Kiểu</th>
                                            <th>Giá trị</th>
                                            <th>Số lượng</th>
                                            <th>Mô tả</th>
                                            <th>Bắt đầu</th>
                                            <th>Kết thúc</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <th>{{ $key + 1 }}</th>
                                                <th>{{ $value->name }}</th>
                                                <th>{{ $value->type }}</th>
                                                <td>{{ number_format($value->value)}}</td>
                                                <th>{{ $value->quantity }}</th>
                                                <th>{!! substr($value->description, 0, 20) !!}</th>
                                                <th>{{ $value->start_date }}</th>
                                                <th>{{ $value->end_date }}</th>
                                                <td class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('discounts.edit', $value->id) }}">
                                                        <button type="submit" class="btn btn-primary text-center">
                                                           Cập nhật
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('discounts.destroy', $value->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger text-center"
                                                                onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                           Xóa
                                                        </button>
                                                    </form>

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
