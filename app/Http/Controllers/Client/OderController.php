<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

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

        $orders = $orders->first()->id;
//        return view('client.oders.oder',compact('categories'));
        return view('client.oders.product-detail',compact('categories','products','tables','orders'));
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
        return view('client.oders.product-detail',compact('categories','products'));
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
