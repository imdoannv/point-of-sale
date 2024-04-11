<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countUser = User::all()->count();
        $countProduct = Product::all()->count();
        $countTable  = Table::all()->count();
        $countOrder = Order::all()->count();
        $revenue_service_today = Bill::query()->whereDate('created_at', today())->sum('total_price');

        $currentMonth = Carbon::now()->month;
        $revenue_service_current_month = Bill::query()
            ->whereMonth('created_at', $currentMonth)
            ->sum('total_price');

        $previousMonth = Carbon::now()->subMonth()->month;

        $revenue_service_previous_month = Bill::query()
            ->whereMonth('created_at', $previousMonth)
            ->sum('total_price');

        return view('dashboard.thongke',compact('countUser','countProduct','countTable','countOrder','revenue_service_today'
        ,'revenue_service_current_month','revenue_service_previous_month'));
    }

    public function exportRevenue(){

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
