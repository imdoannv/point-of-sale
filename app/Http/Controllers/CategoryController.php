<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::query()->latest()->paginate(8);
        return view('categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $model = new Category();
            $model->fill($request->all());
            if ($request->hasFile('image')) {
                $model->image=upload_file('categories',$request->file('image'));
            }
            $model->save();
            toastr()->success('Thêm danh mục thành công!','Thành công');
            return to_route('categories.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm danh mục thất bại!','Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string  $id)
    {
        $data = Category::findOrFail($id);
        return view('categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        try {
            $model = Category::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_image') ){
                $model->avatar=upload_file('categories',$request->file('new_image'));
            }else{
                $model->image=$request->old_image;
            }
            $model->save();
            if($request->hasFile('new_image')){
                delete_file($request->old_image);
            }
            toastr()->success('Sửa thông tin danh mục thành công!','Thành công');
            return to_route('categories.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin danh mục thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) //Xóa mềm
    {
        try {
            $category->delete();
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
            $data = Category::onlyTrashed()->paginate(8);
            return view('categories.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Category::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa danh mục thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa danh mục thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Category::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục danh mục thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục danh mục thất bại!','Thất bại');
            return back();
        }
    }
}
