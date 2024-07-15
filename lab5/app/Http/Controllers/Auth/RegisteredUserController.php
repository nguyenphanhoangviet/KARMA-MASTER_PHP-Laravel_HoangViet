<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use App\Mail\RegistrationSuccess;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Đặt chiều dài tối thiểu là 8 ký tự
                    ->mixedCase() // Yêu cầu mật khẩu bao gồm cả chữ hoa và chữ thường
                    ->letters() // Yêu cầu mật khẩu bao gồm ít nhất một chữ cái
                    ->numbers() // Yêu cầu mật khẩu bao gồm ít nhất một số
                    ->symbols(), // Yêu cầu mật khẩu bao gồm ít nhất một ký tự đặc biệt
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Gửi email đăng ký thành công
        Mail::to($user->email)->send(new RegistrationSuccess($user));

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
}
