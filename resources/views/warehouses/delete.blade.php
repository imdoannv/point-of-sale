@extends('layouts.master')
@section('title', 'Thùng rác | Danh mục sản phẩm')
@section('title-content', 'Thùng rác | Danh mục sản phẩm')
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
                                        <a class="btn btn-success" href="{{ route('warehouses.index') }}">Danh sách</a>
                                    </div>
                                    <table id="tech-companies-1" class="table table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên kho</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td class="">{{ $key +1 }}</td>
                                                <td class="">{!! substr($value->name, 0, 30) !!}</td>
                                                <td class="">{!! substr($value->phone, 0, 30) !!}</td>
                                                <td class="">{{$value->address}}</td>
                                                <td  class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('warehouses-restore', $value->id) }}">
                                                        <button type="submit"  class="btn btn-primary text-center">
                                                            Hoàn lại
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('warehouses-permanently-delete', $value->id) }}"
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

