@extends('layouts.master')
@section('title', 'Thùng rác | Tài khoản người dùng')
@section('title-content', 'Thùng rác | Tài khoản người dùng')
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
                                        <a class="btn btn-success" href="{{ route('users.index') }}">Danh sách</a>
                                    </div>
                                    <table id="tech-companies-1" class="table table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Ảnh</th>
                                            <th>Vai trò</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td >{{ $key + 1 }}</td>
                                                <td >{!! substr($value->name, 0, 20) !!}</td>
                                                <td >{!! substr($value->email, 0, 30) !!}</td>
                                                <td >
                                                    @if ($value->avatar && asset($value->avatar))
                                                        <img src="{{ asset($value->avatar) }}" alt=""
                                                             style="width: 80px; height: 80px">
                                                    @else
                                                        <img src="{{ asset('no_image.jpg') }}" alt=""
                                                             style="width: 80px; height: 80px">
                                                    @endif
                                                </td>
                                                <td >
                                                    @if($value->role == 'vendor')
                                                        Nhà cung cấp
                                                    @elseif($value->role == 'admin')
                                                        Quản trị viên
                                                    @else
                                                        {{ $value->role }}
                                                    @endif
                                                </td>
                                                <td  class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('users-restore', $value->id) }}">
                                                        <button type="submit"  class="btn btn-primary text-center">
                                                            Hoàn lại
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('users-permanently-delete', $value->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"  class="btn btn-danger text-center" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                            Xóa vĩnh viễn
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

