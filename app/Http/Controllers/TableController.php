<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Floor;
use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::all();
        $data = Table::query()->latest()->paginate(8);
        return view('tables.index', compact('data','floors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $floors = Floor::all();
        return view('tables.create',compact('floors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        try {
            $model = new Table();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm bàn mới thành công!','Thành công');
            return to_route('tables.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm bàn mới thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Table::query()->findOrFail($id);
        $floors = Floor::all();

        return view('tables.edit',compact('data','floors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        try {
            $model = Table::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa thông tin bàn thành công!','Thành công');
            return to_route('tables.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin bàn thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        try {
            $table->delete();
            toastr()->success('Chuyển bàn vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa bàn thất bại!', 'Thất bại');
            return back();
        }
    }
    public function deleted(){ // Thùng rác
        try {
            $data = Table::onlyTrashed()->paginate(8);
            return view('tables.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Table::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa bàn thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa bàn thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Table::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục bàn thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục bàn thất bại!','Thất bại');
            return back();
        }
    }
}
