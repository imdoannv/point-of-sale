<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUnitRequest;
use App\Models\ProductUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductUnit::query()->latest()->paginate(8);
        return view('product-units.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product-units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductUnitRequest $request)
    {
        try {
            $model = new ProductUnit();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm đơn vị tài khoản thành công!','Thành công');
            return to_route('product-units.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm đơn vị tài khoản thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductUnit $productUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProductUnit::findOrFail($id);
        return view('product-units.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUnitRequest $request, string $id)
    {
        try {
            $model = ProductUnit::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa đơn vị sản phẩm thành công!','Thành công');
            return to_route('product-units.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa đơn vị sản phẩm thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductUnit $productUnit) //Xóa mềm
    {
        try {
            $productUnit->delete();
            toastr()->success('Chuyển danh mục vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa danh mục thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = ProductUnit::onlyTrashed()->paginate(8);
            return view('product-units.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = ProductUnit::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa đơn vị sản phẩm thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa đơn vị sản phẩm thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = ProductUnit::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục đơn vị sản phẩm thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục đơn vị sản phẩm thất bại!','Thất bại');
            return back();
        }
    }
}
