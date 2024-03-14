<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = Employee::query()->latest()->paginate(8);
        return view('employees.index', compact('data','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNotIn('id', function ($query) {
            $query->select('user_id')
                ->from('employees');
        })->get();
        return view('employees.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $model = new Employee();
            $model->fill($request->all());
            $model->save();
            toastr()->success('Thêm thông tin nhân viên thành công!','Thành công');
            return to_route('employees.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thêm thông tin nhân viên thất bại!','Thất bại');
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
        $users = User::whereNotIn('id', function ($query) use ($id) {
            $query->select('user_id')
                ->from('employees')
                ->where('id', '!=', $id);
        })->get();
        $model = Employee::query()->findOrFail($id);
        return view('employees.edit', compact('model',  'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        try {
            $model = Employee::findOrFail($id);
            $model->fill($request->all());
            $model->save();
            toastr()->success('Sửa thông tin nhân viên thành công!','Thành công');
            return to_route('employees.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Sửa thông tin nhân viên thất bại!','Thất Bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            toastr()->success('Chuyển thông tin nhân viên vào kho lưu trữ thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa thông tin nhân viên thất bại!', 'Thất bại');
            return back();
        }
    }
    public function deleted(){ // Thùng rác
        try {
            $data = Employee::onlyTrashed()->paginate(8);
            return view('employees.delete', compact('data'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back();
        }
    }

    public function permanentlyDelete($id)
    {
        try {
            $data = Employee::where('id', $id);
            $data->forceDelete();
            toastr()->success('Xóa thông tin nhân viên thành công!','Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Xóa thông tin nhân viên thất bại!','Thất bại');
            return back();
        }
    }

    public function restore($id){
        try {
            $data = Employee::onlyTrashed()->find($id);
            $data->restore();
            toastr()->success('Khôi phục thông tin nhân viên thành công!','Thành công');
            return redirect()->back();
        }
        catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Khôi phục thông tin nhân viên thất bại!','Thất bại');
            return back();
        }
    }
}
