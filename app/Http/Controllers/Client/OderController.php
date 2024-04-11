<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name', 'asc')
            ->get();

        $category_id = Category::find(1);

        if (!$category_id) {
            $category_id = Category::first();
        }
        $products = $category_id->products;

        $id = $request->input('id'); // Lấy giá trị của tham số 'id' từ URL

        // Xử lý truy vấn dữ liệu
        $tables = Table::where('id', $id)->first();


        // Xử lý truy vấn dữ liệu
        $orders = Order::with('table')
            ->where('table_id', $id)
            ->whereHas('table', function ($query) {
                $query->where('status', 'occupied');
            })
            ->get();
        $order_id = $orders->last()->id;

        return view('client.orders.order',compact('categories','products','tables','order_id'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name', 'asc')
            ->get();
        $category_id= Category::find($id);
        $products = $category_id->products;
        return view('client.orders.order',compact('categories','products'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $order_id_new = $request->order_id;

            $order = Order::find($id);

            if ($order) {
                $orderDetails = OrderDetail::whereHas('orders', function ($query) use ($id) {
                    $query->where('id', $id);
                })->get();

                foreach ($orderDetails as $value) {
                    $value->order_id = $order_id_new;
                    $value->save();
                }
            }

//          Start  Xóa bàn vì đã gộp
            $data = Order::where('id', $id);

            $record_order = Order::find($id);
            $record_table = Table::find($record_order->table_id);
            $record_table->status = 'available';

            $record_table->save();
            $data->forceDelete();
//          End  Xóa bàn vì đã gộp

            toastr()->success('Chuyến hóa đơn thanh toán thành công!','Thành công');
            return to_route('/');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Chuyến hóa đơn thanh toán thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
