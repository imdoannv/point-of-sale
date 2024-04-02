@extends('client.layouts.master')
@section('title','Đặt hàng')
@section('title-content','Đặt hàng')
@section('content')
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">


        @if (count($order_details) > 0)
            <a href="#" class="text-center btn btn-primary my-4" onclick="goBack()">Tiếp tục chọn món</a>

        <table class="table table-report -mt-2" id="myTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Giá</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order_details as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->products->name}}</td>
                        <td>{{ $value->products->name}}</td>
                        <td class="text-center"><input type="number" name="quantity" value="{{$value->quantity}}" min="1" max="10" id="quantityInput" onchange="updatePrice(this)" ></td>
                        <td class="text-center">{{number_format($value->quantity* $value->products->price)}}</td>
                        <td class="text-center">{{number_format($value->quantity* $value->products->price)}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <form action="#" method="POST">
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
        </table>

            <!-- BEGIN: Ticket -->
            <div class="col-span-12 lg:col-span-4">
                <div class="tab-content">
                    <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                        <div class="box flex p-5 mt-5">
                            <input type="text" class="form-control py-3 px-4 w-full bg-slate-100 border-slate-200/60 pr-10" placeholder="Use coupon code...">
                            <button class="btn btn-primary ml-2">Apply</button>
                        </div>
                        <div class="box p-5 mt-5">
                            <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mr-auto">Thông tin khách hàng</div>
                                <div class="font-medium text-base">
                                    <select class="form-select" name="customer_id">
                                        <option value="customer" selected>Khách vãng lai</option>
                                        @foreach ($customers as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex mt-4">
                                <div class="mr-auto">Tiền giỏ hàng</div>
                                <div class="font-medium"><input class="text-center border-0 mx-0" type="text" id="sum" value="0" disabled>VND</div>
                            </div>
                            <div class="flex mt-4">
                                <?php $discount = 0?>
                                <div class="mr-auto">Giảm giá</div>
                                <div class="font-medium text-danger" id="discount">{{$discount}} VND</div>
                            </div>
                            <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                                <div class="mr-auto font-medium text-base">Thành tiền</div>
                                <div class="font-medium text-base"><input class="text-center border-0 mx-0" type="text" id="total" value="0" disabled>VND</div>
                            </div>

                            @if (Auth::user())
                                <input type="text" value=" {{ Auth::user()->id }}" name="user_id" hidden>
                            @endif

                        </div>
                        <div class="flex mt-5">
                            <button class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">Clear</button>
                            <button class="btn btn-primary w-32 shadow-md ml-auto">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Ticket -->
        @else
            <div class="mx-auto text-center my-5">
                <p class="text-center btn btn-danger">Giỏ hàng trống</p>
                <a href="#" class="text-center btn btn-primary" onclick="goBack()">Tiếp tục chọn món</a>
            </div>
        @endif
    </div>
    <!-- END: Data List -->




    <script>
        function updatePrice(quantityInput) {
            var quantity = parseInt(quantityInput.value);
            var priceCell = quantityInput.parentNode.nextElementSibling;
            var price = parseFloat(priceCell.innerText);

            var totalPrice = price * quantity

            var totalPriceCell = quantityInput.parentNode.nextElementSibling.nextElementSibling;
            totalPriceCell.innerText = formatNumber(totalPrice.toFixed(0)  * 1000);
        }

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function goBack() {
            window.history.back();
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
            document.getElementById('sum').value = formatNumber(sum * 1000);
            document.getElementById('total').value = formatNumber((parseFloat(document.getElementById('sum').value) - parseFloat(document.getElementById('discount').innerHTML))*1000);
        });
    </script>

@endsection
