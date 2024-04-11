@extends('layouts.master')
@section('title', 'Danh sách người dùng')
@section('title-content', 'Danh sách người dùng')
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
                                        <a class="btn btn-success" href="{{ route('users.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('users-deleted') }}">Thùng rác</a>
                                        <a class="btn btn-pending" href="{{ route('export') }}">Xuất báo cáo</a>
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Vai trò</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td class="">{{ $key +1 }}</td>
                                                <td class="">{!! substr($value->name, 0, 20) !!}</td>
                                                <td class="">{!! substr($value->email, 0, 30) !!}</td>

{{--                                                <td class="">{!! substr($value->phone, 0, 20) !!}</td>--}}
                                                <td class="">
                                                    @if ($value->avatar && asset($value->avatar))
                                                        <img src="{{ asset($value->avatar) }}" alt="" style="width: 80px; height: 80px">
                                                    @else
                                                        <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 80px; height: 80px">
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if($value->role == 'superadmin')
                                                        Quản trị viên
                                                    @elseif($value->role == 'admin')
                                                        Nhân viên
                                                    @else
                                                        {{ $value->role }}
                                                    @endif
                                                </td>
                                                <td class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('users.edit', $value->id) }}">
                                                        <button type="submit" class="btn btn-primary text-center">
                                                           Cập nhật
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('users.destroy', $value->id) }}" method="POST">
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
