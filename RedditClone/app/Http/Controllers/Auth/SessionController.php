<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember_me'))) {
            return redirect()->back()->with('failure', __('Unuccessful login!'));;
        }

        $request->session()->regenerate();

        return redirect()->back()->with('success', __('Successful login!'));;
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
