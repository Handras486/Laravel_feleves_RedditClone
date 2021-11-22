<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return redirect()->route('home');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'email' => 'required|max:200|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('failure', __('Unsuccessful registration!'));;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->back()->with('success', __('Successful registration!'));;
    }
}
