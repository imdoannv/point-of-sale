<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        $customers = Customer::all();
        $users = User::all();
        $discounts = Discount::all();
        $data = Bill::query()->latest()->paginate(8);
        return view('bills.index',compact('data', 'tables', 'customers', 'users', 'discounts'));
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
            $model = new Bill();
            $model->fill($request->all());
            if($request->customer_id == 'customer'){
                $model->customer_id = null;
            }

            $model->save();

            $record_order = Order::find($model->order_id);
            $record_order->status = 'paid';
            $order_id = $record_order->table_id;
            $record_order->save();

            $record_table = Table::find($order_id);
            $record_table->status = 'available';
            $record_table->save();

            toastr()->success('Thanh toán thành công!','Thành công');
            return to_route('/');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thanh toán thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {

    }
}
