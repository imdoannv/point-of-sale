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
                                        <a class="btn btn-success" href="{{ route('categories.index') }}">Danh sách</a>
                                    </div>
                                    <table id="tech-companies-1" class="table table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr id="row_@item.ID">
                                                <td class="">{{ $key +1 }}</td>
                                                <td class="">{!! substr($value->name, 0, 30) !!}</td>
                                                <td class="ml-2" >
                                                    @if ($value->image && asset($value->image))
                                                        <img  src="{{ asset($value->image) }}" alt="" style="width: 80px; height: 80px">
                                                    @else
                                                        <img src="{{ asset('no_image.jpg') }}" alt="" style="width: 80px; height: 80px">
                                                    @endif
                                                </td>
                                                <td class="">{{$value->description}}</td>
                                                <td  class="grid grid-cols-6 gap-3">
                                                    <a href="{{ route('categories-restore', $value->id) }}">
                                                        <button type="submit"  class="btn btn-primary text-center">
                                                            Hoàn lại
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('categories-permanently-delete', $value->id) }}"
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

