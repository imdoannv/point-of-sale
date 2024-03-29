@extends('client.layouts.master')
@section('title','Đặt hàng')
@section('title-content','Đặt hàng')
@section('content')
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">


        @if (count($products) > 0)

        <table class="table table-report -mt-2" id="myTable">
            <thead>
            <tr>
                <th class="whitespace-nowrap">#</th>
                <th class="text-center whitespace-nowrap">Sản phẩm</th>
                <th class="text-center whitespace-nowrap">Số lượng</th>
                <th class="text-center whitespace-nowrap">Giá sản phẩm</th>
                <th class="text-center whitespace-nowrap">Giá</th>
                <th class="text-center whitespace-nowrap"></th>
            </tr>
            </thead>
            <tbody>

            @foreach ($products as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td class="font-medium whitespace-nowrap">{{$value->name}}</td>
                    <td class="text-center"><input type="number" name="quantity" value="{{$cart[$value->id]}}" min="1" max="10" id="quantityInput" onchange="updatePrice(this)" ></td>
                    <td class="text-center">{{$value->price}}</td>
                    <td class="text-center">{{$cart[$value->id]* $value->price}}</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            {{--                        <a class="flex items-center mr-3" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>--}}
                            <form action="{{ route('cart.remove', $value->id) }}" method="POST">
{{--                            <form action="{{ route('delete_cart', $value->id) }}" method="POST">--}}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger text-center"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="intro-x">
                    <th colspan="4" class="text-center">Tổng tiền</th>
                    <th class="text-center"><input class="text-center" type="text" id="sum" value="0"></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        @else
            <p>Giỏ hàng trống</p>
        @endif
    </div>
    <!-- END: Data List -->


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
       </div>
</div>
<!-- END: Ticket -->

    <script>
        function updatePrice(quantityInput) {
            var quantity = parseInt(quantityInput.value);
            var priceCell = quantityInput.parentNode.nextElementSibling;
            var price = parseFloat(priceCell.innerText);

            var totalPrice = price * quantity;

            var totalPriceCell = quantityInput.parentNode.nextElementSibling.nextElementSibling;
            totalPriceCell.innerText = totalPrice.toFixed(0);
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            // Lấy tất cả các phần tử của cột "price" trong bảng
            var prices = document.querySelectorAll('#myTable td:nth-child(5)');

            // Khai báo biến để tính tổng giá trị
            var sum = 0;

            // Lặp qua từng phần tử và cộng giá trị vào biến sum
            prices.forEach(function(price) {
                sum += parseFloat(price.textContent);
            });

            // Gán giá trị sum vào thẻ input có id là "sum"
            document.getElementById('sum').value = sum;
        });
    </script>

@endsection
