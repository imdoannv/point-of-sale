<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        $products = Product::all();
        $data = BillDetail::query()->latest()->paginate(8);
        return view('bills.bill-detail',compact('data', 'products', 'bills'));
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
        $bills = Bill::all();
        $products = Product::all();
        $data = BillDetail::query()->findOrFail($id);
        return view('bills.bill-detail',compact('data', 'products', 'bills'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillDetail $billDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillDetail $billDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillDetail $billDetail)
    {
        //
    }
}
