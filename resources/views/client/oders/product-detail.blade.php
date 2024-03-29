@extends('client.oders.oder')
@section('product')
    @foreach($products as $value)
        <a href="#" class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
            <div class="box rounded-md p-3 relative zoom-in">
                <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                    <div class="absolute top-0 left-0 w-full h-full image-fit">
                        @if ($value->image && asset($value->image))
                            <img alt="Ảnh đồ ăn" class="rounded-md" src="{{ asset($value->image) }}">
                        @else
                            <img src="{{ asset('no_image.jpg') }}" alt="" class="rounded-md">
                        @endif
                    </div>
                </div>

                <div class="block font-medium text-center truncate mt-3">{{$value->name}}</div>
                <div class=" text-right">
                    <form action="{{ route('cart.add') }}" class="block font-medium text-center truncate mt-3" method="POST">
                        @csrf
                        @method('post')
                        <input type="text" value="{{$value->id}}" name="product_id" hidden>
                        <input type="text" value="1" name="quantity" hidden>
                        <input type="text" value="{{$value->price}}" name="price" hidden>
                        <button class="btn btn-primary w-32  ">Thêm Giỏ</button>
                    </form>

                </div>
            </div>
        </a>

    @endforeach
@endsection

