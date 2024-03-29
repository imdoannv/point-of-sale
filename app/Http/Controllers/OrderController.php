<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
            $model = new Order();
            $model->fill($request->all());

            // Kiểm tra nếu đã tồn tại bản ghi với table_id và status là pending
            $existingRecord = Order::where('table_id', $model->table_id)
                ->where('status', 'pending')
                ->first();

            if ($existingRecord) {
                toastr()->error('Bàn này đang có khách sử dụng!', 'Thất bại');
                return back();
            }
            $model->save();

            // Lấy giá trị từ biểu mẫu POST
            $tableId = $request->input('table_id');

            // Cập nhật trạng thái "status" của bản ghi "tables"
            $table = Table::find($tableId);
            if ($table) {
                $table->status = 'occupied'; // Thay đổi trạng thái thành 'booked' (hoặc giá trị khác tùy thuộc vào logic của bạn)
                $table->save();
            }

//            session(['model' => $model]);
            toastr()->success('Đặt bàn thành công!','Thành công');

            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Đặt bàn thất bại!','Thất bại');
            return back();
        }
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
        return view('client.oders.product-detail',compact('categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
