<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Mail\LoginSuccess;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('Auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ])->withInput($request->only('email', 'remember'));
        }

        $request->session()->regenerate();
        $user = Auth::user();
        
        // Kiểm tra nếu người dùng không tồn tại
        if (!$user) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => __('auth.failed'),
            ]);
        }

        // Gửi email đăng nhập thành công
        Mail::to($user->email)->send(new LoginSuccess($user));

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
