<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Livewire\Users;

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('success', 'Successfully logged in!');
    }
    return back()->withInput()->with('error', 'Invalid credentials.');
})->name('login');

Route::view('/dashboard', '/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/profile', '/profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('users', Users::class)->name('users');
});

Route::post('logout', function () {
    Auth::guard('web')->logout();
    Session::invalidate();
    Session::regenerateToken();
    return redirect('/')->with('success', 'Successfully logged out!');
})->name('logout');
