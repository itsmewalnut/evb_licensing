<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard')->with('success', 'Successfully logged in!');
    }
    return back()->withInput()->with('error', 'Invalid credentials.');
})->name('login');

Route::prefix('admin')->controller(UserController::class)->middleware('auth')->group(function () {
    Route::view('dashboard', '/admin/dashboard')->name('dashboard');
    Route::view('settings/profile', 'settings/profile')->name('settings.profile');
    Route::view('users', 'index')->name('users');
});

Route::post('logout', function () {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/')->with('success', 'Successfully logged out!');
})->name('logout');
