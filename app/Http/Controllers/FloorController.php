<?php

namespace App\Http\Controllers;

use App\Http\Requests\FloorRequest;
use App\Models\Floor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Floor::query()->latest()->paginate(8);
        return view('floors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('floors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FloorRequest $request)
    {
        try {
            $model = new Floor();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm tầng thành công!','Thành công');
            return to_route('floors.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm tầng thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Floor $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string  $id)
    {
        $data = Floor::findOrFail($id);
        return view('floors.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FloorRequest $request, string $id)
    {

        try {
            $model = Floor::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa thông tin tầng thành công!','Thành công');
            return to_route('floors.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin tầng thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor) //Xóa mềm
    {
        try {
            $floor->delete();
            toastr()->success('Chuyển tầng vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tầng thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = Floor::onlyTrashed()->paginate(8);
            return view('floors.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Floor::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa tầng thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tầng thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Floor::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục tầng thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục tầng thất bại!','Thất bại');
            return back();
        }
    }
}
