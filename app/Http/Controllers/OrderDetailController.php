<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $model = new OrderDetail();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm giỏ hàng thành công!','Thành công');
            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm giỏ hàng thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    public function showCart(Request $request)
    {
        $order_cart_id = $request->input('order_cart_id'); // Lấy giá trị của tham số 'id' từ URL
        $order_details = OrderDetail::where('order_id', $order_cart_id)->get();
        $products = Product::all();
        $customers = Customer::all();
        return view('client.orders.cart',compact('products','order_details','customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
