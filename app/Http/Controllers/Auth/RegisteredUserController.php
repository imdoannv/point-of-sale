<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Brian2694\Toastr\Facades\Toastr;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','regex:/^(?=.*[A-Z])(?=.*\d).+$/', 'min:6', 'max:35', 'confirmed'],
        ], [
            'name.required' => 'Họ tên bắt buộc nhập.',
            'name.string' => 'Họ tên phải là chữ.',
            'name.min' => 'Tên ít nhất :min kí tự.',
            'name.max' => 'Tên nhiều nhất :max kí tự.',
            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Địa chỉ email không được vượt quá :max ký tự.',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống.',
            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa và ít nhất một số.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá :max ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        if(isset($request['avatar']) && $request['avatar']) {
            $request['avatar'] = upload_file(OBJECT_USER, $request['avatar']);
        }else{
            $request['avatar']=null;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        toastr()->success('Tạo tài khoản thành công!', 'Thành công');
        return redirect(RouteServiceProvider::HOME);

    }
}
