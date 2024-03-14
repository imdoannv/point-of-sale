@extends('layouts.master')
@section('title', 'Danh sách nhân viên')
@section('title-content', 'Danh sách nhân viên')
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
                                        <a class="btn btn-success" href="{{ route('employees.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('employees-deleted') }}">Thùng rác</a>
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Email nhân viên</th>
                                            <th>Số điện thoại</th>
                                            <th>Lương</th>
                                            <th>Chấm công</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td>{{ $key +1 }}</td>
                                                <td>
                                                    @isset($value->users->email)
                                                        {{ $value->users->email }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>
                                                <td>{!! substr($value->phone, 0, 30) !!}</td>
                                                <td>{{ number_format($value->salary)}}</td>
                                                <td>{!! substr($value->timekeeping, 0, 30) !!}</td>

{{--                                                <td class="">{!! substr($value->phone, 0, 20) !!}</td>--}}

                                                <td class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('employees.edit', $value->id) }}">
                                                        <button type="submit" class="btn btn-primary text-center">
                                                           Cập nhật
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('employees.destroy', $value->id) }}" method="POST">
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

