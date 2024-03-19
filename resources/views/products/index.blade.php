@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('title-content', 'Danh sách sản phẩm')
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
                                        <a class="btn btn-success" href="{{ route('products.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('products-deleted') }}">Thùng rác</a>
                                    </div>
                                    <table id="tech-companies-1" class="table mb-0">
                                        <thead  class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Danh mục</th>
                                            <th>Đơn vị sản phẩm</th>
                                            <th>Kho hàng</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody  class="text-center">
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td>{{ $key +1 }}</td>
                                                <td>{!! substr($value->name, 0, 30) !!}</td>
                                                <td>{{ number_format($value->price)}}</td>
                                                <td>{{ number_format($value->quantity)}}</td>
                                                <td>
                                                    @if ($value->image && asset($value->image))
                                                        <img src="{{ asset($value->image) }}" alt="" style="width: 80px; height: 80px">
                                                    @else
                                                        <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 80px; height: 80px">
                                                    @endif
                                                </td>
                                                <td>{!! substr($value->description, 0, 50) !!}</td>
                                                <td>
                                                    @isset($value->categories->name)
                                                        {{ $value->categories->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->product_units->name)
                                                        {{ $value->product_units->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($value->warehouses->name)
                                                        {{ $value->warehouses->name }}
                                                    @else
                                                        null
                                                    @endisset
                                                </td>

                                                <td class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('products.edit', $value->id) }}">
                                                        <button type="submit" class="btn btn-primary text-center">
                                                           Cập nhật
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('products.destroy', $value->id) }}" method="POST">
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
