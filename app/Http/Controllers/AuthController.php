<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginView() : View | RedirectResponse
    {
        if (Auth::check()) {
            return redirect("/dashboard");
        }
        return view('auth/login', [
            "title" => "Login"
        ]);
    }
    
    public function login(LoginRequest $request) : JsonResponse | RedirectResponse
    {
        // $credentials = $request->data();
        if (Auth::attempt($request->data())) {
            $request->session()->regenerate();
            return response()->json();
        }
        return back()->withErrors([
            "email" => "Input data is wrong.",
        ])->onlyInput("email");
    }

    public function logout(Request $request) : JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();

        return response()->json();
    }
}
