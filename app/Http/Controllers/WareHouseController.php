<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\WareHouseRequest;
use App\Models\WareHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WareHouse::query()->latest()->paginate(8);
        return view('warehouses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WareHouseRequest $request)
    {
        try {
            $model = new WareHouse();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm kho thành công!','Thành công');
            return to_route('warehouses.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm kho thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WareHouse $wareHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WareHouse::findOrFail($id);
        return view('warehouses.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WareHouseRequest $request, string $id)
    {
        try {
            $model = WareHouse::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa thông tin kho thành công!','Thành công');
            return to_route('warehouses.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin kho thất bại!','Thất Bi');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WareHouse $warehouse)
    {
        try {
            $warehouse->delete();
            toastr()->success('Chuyển kho này vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa kho này thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = WareHouse::onlyTrashed()->paginate(8);
            return view('warehouses.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = WareHouse::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa kho thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa kho thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = WareHouse::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục kho thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục kho thất bại!','Thất bại');
            return back();
        }
    }
}
