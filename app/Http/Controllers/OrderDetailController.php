<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Product;
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
            return to_route('oder');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm giỏ hàng thất bại!','Thất bại');
            return back();
        }

//        $productId = $request->input('product_id');
//        $quantity = $request->input('quantity');
//        $price = $request->input('price');
//
//        // Kiểm tra nếu không có giỏ hàng trong session, ta tạo một giỏ hàng mới
//        if (!$request->session()->has('cart')) {
//            $request->session()->put('cart', []);
//        }
//
//        // Lấy giỏ hàng từ session
//        $cart = $request->session()->get('cart');
//
//        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng, ta tăng số lượng
//        if (isset($cart[$productId])) {
//            $cart[$productId] += $quantity;
//        } else {
//            // Nếu sản phẩm chưa tồn tại, ta thêm sản phẩm mới vào giỏ hàng
//            $cart[$productId] = $quantity;
//        }
//
//        // Lưu giỏ hàng vào session
//        $request->session()->put('cart', $cart);
//
//        toastr()->success('Thêm sản phẩm vào giỏ hàng thành công!','Thành công');
//
//        // Lấy giỏ hàng từ session
//        $cart = $request->session()->get('cart');
//
//        if (is_array($cart)) {
//            // Lấy thông tin chi tiết về các sản phẩm trong giỏ hàng
//            $productIds = array_keys($cart);
//            $products = Product::whereIn('id', $productIds)->get();
//
//            return view('client.oders.cart', compact('products', 'cart'));
//        }
//
//        // Giỏ hàng không tồn tại hoặc rỗng
//        $products = [];
//        $cart = [];
//        return view('client.oders.cart', compact('products', 'cart'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
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
