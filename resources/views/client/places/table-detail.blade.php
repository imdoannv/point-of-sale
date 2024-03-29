@extends('client.places.home')
@section('table')
    @foreach($tables as $value)
                    <a href="#" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                        <div class="box rounded-md p-3 relative zoom-in">
                            <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="" class="rounded-md" src="{{asset('admin/images/table.png')}}">
                                </div>
                            </div>
                            <div class="block font-medium text-center truncate mt-3">{{$value->name}}</div>
                        </div>
                    </a>
                    <form action="{{ route('order-add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="text" value="{{$value->id}}" hidden name="table_id">
                        <input type="text" value="pending" hidden name="status">
                        <input type="text" value="0" hidden name="price">


                        @if($value->status == 'occupied')
                            <div><a href="{{ route('order', ['id' => $value->id]) }}" class="btn btn-success">Gọi món</a></div>
                        @else
                            <button class="btn btn-primary"> Đặt bàn</button>
                        @endif
                    </form>

    @endforeach
@endsection
