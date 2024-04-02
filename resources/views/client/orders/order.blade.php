@extends('client.layouts.master')
@section('title', 'Chi tiết đặt đơn')
@section('title-content', 'Chi tiết đặt đơn')
@section('content')
    <!-- END: Content -->

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

            <h2 class="text-lg font-medium mr-auto">
                Đang order với mã hóa đơn: <span class="btn btn-success">{{$order_id}}</span>
                cho bàn <span class="btn btn-success">{{$tables->name}}</span>
            </h2>

            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('show-cart',['order_cart_id' => $order_id])}}" data-tw-toggle="modal" data-tw-target="#new-order-modal" class="btn btn-primary shadow-md mr-2">Giỏ hàng</a>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Item List -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="lg:flex intro-y">
                    <div class="relative">
                        <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="Search item...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search"></i>
                    </div>
                    <select class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option>Sort By</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                        <option>Lowest Price</option>
                        <option>Highest Price</option>
                    </select>
                </div>
                <div class="grid grid-cols-12 gap-5 mt-5">
                    @foreach($categories as $value)
                        <a href="{{ route('show-food', $value->id) }}" class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                            <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                                <div class="font-medium text-base">{{$value->name}}</div>

                                <div class="text-slate-500">{{$value->products_count}} Món </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
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
                                    <form action="{{ route('carts.store') }}" class="block font-medium text-center truncate mt-3" method="POST">
                                        @csrf
                                        @method('post')
                                        <input type="text" value="{{{$order_id}}}" name="order_id" hidden>
                                        <input type="text" value="{{$value->id}}" name="product_id" hidden>
                                        <input type="text" value="1" name="quantity" hidden>
                                        <input type="text" value="{{$value->price}}" name="price" hidden>
                                        <button class="btn btn-primary w-32  ">Thêm Giỏ</button>
                                    </form>

                                </div>
                            </div>
                        </a>

                    @endforeach
                </div>
            </div>
            <!-- END: Item List -->
            <!-- BEGIN: Ticket -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <ul class="nav nav-pills" role="tablist">
                            <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#ticket" type="button" role="tab" aria-controls="ticket" aria-selected="true" > Ticket </button>
                            </li>
                            <li id="details-tab" class="nav-item flex-1" role="presentation">
                                <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false" > Details </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                        <div class="box p-2 mt-5">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">Root Beer</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">$139</div>
                            </a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">Spaghetti Fettucine Aglio with Smoked Salmon</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">$44</div>
                            </a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">Fried/Grilled Banana</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">$79</div>
                            </a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">Spaghetti Fettucine Aglio with Smoked Salmon</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">$47</div>
                            </a>
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal" class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">Soft Drink</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">$33</div>
                            </a>
                        </div>
                        <div class="box flex p-5 mt-5">
                            <input type="text" class="form-control py-3 px-4 w-full bg-slate-100 border-slate-200/60 pr-10" placeholder="Use coupon code...">
                            <button class="btn btn-primary ml-2">Apply</button>
                        </div>
                        <div class="box p-5 mt-5">
                            <div class="flex">
                                <div class="mr-auto">Subtotal</div>
                                <div class="font-medium">$250</div>
                            </div>
                            <div class="flex mt-4">
                                <div class="mr-auto">Discount</div>
                                <div class="font-medium text-danger">-$20</div>
                            </div>
                            <div class="flex mt-4">
                                <div class="mr-auto">Tax</div>
                                <div class="font-medium">15%</div>
                            </div>
                            <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mr-auto font-medium text-base">Total Charge</div>
                                <div class="font-medium text-base">$220</div>
                            </div>
                        </div>
                        <div class="flex mt-5">
                            <button class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">Clear Items</button>
                            <button class="btn btn-primary w-32 shadow-md ml-auto">Charge</button>
                        </div>
                    </div>
                    <div id="details" class="tab-pane" role="tabpanel" aria-labelledby="details-tab">
                        <div class="box p-5 mt-5">
                            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 pb-5">
                                <div>
                                    <div class="text-slate-500">Time</div>
                                    <div class="mt-1">02/06/20 02:10 PM</div>
                                </div>
                                <i data-lucide="clock" class="w-4 h-4 text-slate-500 ml-auto"></i>
                            </div>
                            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                                <div>
                                    <div class="text-slate-500">Customer</div>
                                    <div class="mt-1">Kate Winslet</div>
                                </div>
                                <i data-lucide="user" class="w-4 h-4 text-slate-500 ml-auto"></i>
                            </div>
                            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                                <div>
                                    <div class="text-slate-500">People</div>
                                    <div class="mt-1">3</div>
                                </div>
                                <i data-lucide="users" class="w-4 h-4 text-slate-500 ml-auto"></i>
                            </div>
                            <div class="flex items-center pt-5">
                                <div>
                                    <div class="text-slate-500">Table</div>
                                    <div class="mt-1">21</div>
                                </div>
                                <i data-lucide="mic" class="w-4 h-4 text-slate-500 ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Ticket -->
        </div>
    </div>
    <!-- END: Content -->

@endsection
