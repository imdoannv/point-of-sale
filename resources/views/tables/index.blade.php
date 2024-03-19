@extends('layouts.master')
@section('title', 'Danh sách bàn')
@section('title-content', 'Danh sách bàn')
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
                                        <a class="btn btn-success" href="{{ route('tables.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('tables-deleted') }}">Thùng rác</a>
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Số ghế/bàn</th>
                                            <th>Trạng thái</th>
                                            <th>Tầng</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td>{{ $key +1 }}</td>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->capacity}}</td>
                                                <td>
                                                    @if($value->status == 'available')
                                                        Trống
                                                    @elseif($value->status == 'occupied')
                                                        Đang sử dụng
                                                    @elseif($value->status == 'reserved')
                                                        Đã đặt
                                                    @endif
                                                </td>

                                                <td>
                                                    @isset($value->floors->name)
                                                        {{ $value->floors->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('tables.edit', $value->id) }}">
                                                        <button type="submit" class="btn btn-primary text-center">
                                                           Cập nhật
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('tables.destroy', $value->id) }}" method="POST">
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
