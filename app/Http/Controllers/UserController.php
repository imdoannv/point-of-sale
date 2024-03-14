<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::query()->latest()->paginate(8);
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $model = new User();
            $model->fill($request->all());
            if ($request->hasFile('avatar')) {
                $model->avatar=upload_file(OBJECT_USER,$request->file('avatar'));
            }
            $model->save();
            toastr()->success('Thêm tài khoản thành công!','Thành công');
            return to_route('users.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm tài khoản thất bại!','Thất bại');
            return back();
        }
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
        $data= User::findOrFail($id);
        return view('users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            $model = User::findOrFail($id);
            $model->fill($request->all());
            if($request->has('new_avatar') ){
                $model->avatar=upload_file(OBJECT_USER,$request->file('new_avatar'));
            }else{
                $model->avatar=$request->old_avatar;
            }
            $model->save();
            if($request->hasFile('new_avatar')){
                delete_file($request->old_avatar);
            }
            toastr()->success('Sửa thông tin tài khoản thành công!','Thành công');
            return to_route('users.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin tài khoản thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) //Xóa mềm
    {
        try {
            $user->delete();
            toastr()->success('Chuyển tài khoản vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tài khoản thất bại!', 'Thất bại');
            return back();
        }
    }

    public function deleted(){ // Thùng rác
        try {
            $data = User::onlyTrashed()->paginate(8);
            return view('users.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = User::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa tài khoản thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa tài khoản thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = User::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục tài khoản thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục tài khoản thất bại!','Thất bại');
            return back();
        }
    }
}
