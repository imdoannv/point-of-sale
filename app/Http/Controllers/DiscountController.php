<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Discount::query()->latest()->paginate(8);
        return view('discounts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        try {
            $model = new Discount();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm mã giảm giá thành công!','Thành công');
            return to_route('discounts.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm mã giảm giá thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string  $id)
    {
        $data = Discount::findOrFail($id);
        return view('discounts.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, string $id)
    {

        try {
            $model = Discount::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa thông tin mã giảm giá thành công!','Thành công');
            return to_route('discounts.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin mã giảm giá thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount) //Xóa mềm
    {
        try {
            $discount->delete();
            toastr()->success('Chuyển mã giảm giá vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa mã giảm giá thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = Discount::onlyTrashed()->paginate(8);
            return view('discounts.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Discount::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa mã giảm giá thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa mã giảm giá thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Discount::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục mã giảm giá thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục mã giảm giá thất bại!','Thất bại');
            return back();
        }
    }
}
