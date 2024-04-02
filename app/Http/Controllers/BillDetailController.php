<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        $products = Product::all();
        $data = OrderDetail::query()->latest()->paginate(8);
        return view('bills.bill-detail',compact('data', 'products', 'bills'));
    }

//    public function showCart()
//    {
//        $products = Product::all();
//        $data = BillDetail::query()->latest()->paginate(8);
//        return view('client.orders.cart',compact('data', 'products'));
//    }
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bills = Bill::all();
        $products = Product::all();
        $data = OrderDetail::query()->findOrFail($id);
        return view('bills.bill-detail',compact('data', 'products', 'bills'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $billDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderDetail $billDetail)
    {
        try {
            $model = new OrderDetail();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm tầng thành công!','Thành công');
            return to_route('floors.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm tầng thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $data = OrderDetail::where('id', $id);
            $data->delete();
            toastr()->success('Đã xóa sản phẩm khỏi giỏ hàng!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa sản phẩm thất bại!', 'Thất bại');
            return back();
        }
    }

    public function showCart(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart');

        if (is_array($cart)) {
            // Lấy thông tin chi tiết về các sản phẩm trong giỏ hàng
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->get();

            return view('client.orders.cart', compact('products', 'cart'));
        }

        // Giỏ hàng không tồn tại hoặc rỗng
        $products = [];
        $cart = [];
        return view('client.orders.cart', compact('products', 'cart'));
    }
    public function addToCart(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // Kiểm tra nếu không có giỏ hàng trong session, ta tạo một giỏ hàng mới
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }

        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart');

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng, ta tăng số lượng
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, ta thêm sản phẩm mới vào giỏ hàng
            $cart[$productId] = $quantity;
        }

        // Lưu giỏ hàng vào session
        $request->session()->put('cart', $cart);

        toastr()->success('Thêm sản phẩm vào giỏ hàng thành công!','Thành công');

        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart');

        if (is_array($cart)) {
            // Lấy thông tin chi tiết về các sản phẩm trong giỏ hàng
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->get();

            return view('client.orders.cart', compact('products', 'cart'));
        }

        // Giỏ hàng không tồn tại hoặc rỗng
        $products = [];
        $cart = [];
        return view('client.orders.cart', compact('products', 'cart'));
    }

    public function removeFromCart(Request $request, $productId)
    {
        // Lấy giỏ hàng từ session
        $cart = $request->session()->get('cart');

        if (isset($cart[$productId])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$productId]);

            // Cập nhật giỏ hàng trong session
            $request->session()->put('cart', $cart);

            // Thông báo xóa thành công hoặc chuyển hướng đến trang giỏ hàng
            toastr()->success('Xóa thành công thành công!','Thành công');
            return back();
        }

        // Sản phẩm không tồn tại trong giỏ hàng
        return back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
}
