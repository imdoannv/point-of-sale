@extends('layouts.master')
@section('title', 'Thùng rác | Mã giảm giá')
@section('title-content', 'Thùng rác | Mã giảm giá')
@section('content')
    <div  class=" mt-8"></div>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <div class="mb-2 d-flex gap-1 ">
                                        <a class="btn btn-success" href="{{ route('discounts.index') }}">Danh sách</a>
                                    </div>
                                    <table id="tech-companies-1" class="table table-centered mb-0">
                                        <thead>
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
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->type }}</td>
                                                <td>{{ number_format($value->value)}}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td>{!! substr($value->description, 0, 20) !!}</td>
                                                <td>{{ $value->start_date }}</td>
                                                <td>{{ $value->end_date }}</td>
                                                <td  class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('discounts-restore', $value->id) }}">
                                                        <button type="submit"  class="btn btn-primary text-center">
                                                            Hoàn lại
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('discounts-permanently-delete', $value->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"  class="btn btn-danger text-center" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                            Xóa vĩnh viễn
                                                        </button>
                                                    </form>`
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

