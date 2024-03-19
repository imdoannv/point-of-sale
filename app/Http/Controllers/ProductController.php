<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\WareHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $product_units = ProductUnit::all();
        $warehouses = WareHouse::all();
        $data = Product::query()->latest()->paginate(8);
        return view('products.index', compact('data','categories','product_units','warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_units = ProductUnit::all();
        $categories = Category::all();
        $warehouses = WareHouse::all();

        return view('products.create',compact('product_units', 'categories','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $model = new Product();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $model->image=upload_file('products',$request->file('image'));
            }
            $model->save();
            toastr()->success('Thêm sản phẩm thành công!','Thành công');
            return to_route('products.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm sản phẩm thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product_units = ProductUnit::all();
        $data= Product::query()->findOrFail($id);
        $warehouses = WareHouse::all();

        return view('products.edit',compact('data','categories','product_units','warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {
            $model = Product::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_image') ){
                $model->image=upload_file('products',$request->file('new_image'));
            }else{
                $model->image=$request->old_image;
            }
            $model->save();
            if($request->hasFile('new_image')){
                delete_file($request->old_image);
            }
            toastr()->success('Sửa thông tin sản phẩm thành công!','Thành công');
            return to_route('products.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin sản phẩm thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) //Xóa mềm
    {
        try {
            $product->delete();
            toastr()->success('Chuyển sản phẩm vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa sản phẩm thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = Product::onlyTrashed()->paginate(8);
            return view('products.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Product::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa sản phẩm thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa sản phẩm thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Product::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục sản phẩm thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục sản phẩm thất bại!','Thất bại');
            return back();
        }
    }
}
