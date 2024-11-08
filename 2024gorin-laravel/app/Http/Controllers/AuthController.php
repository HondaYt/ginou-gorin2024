<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.index');
    }
    public function login(Request $request)
    {   
        $request->session()->regenerateToken();

        $varidated =$request->validate([
            'email'=>['required','email'],
            'password' => ['required'],
        ],[
            'email.required'=>'メールアドレスが未入力です',
            'password.required'=>'パスワードが未入力です',
        ]);
        $varidated = $request->only('email','password');

        if(Auth::attempt($varidated)){

            $request->session()->regenerate();
            return redirect()->route('index');
        }
        return back()->withErrors([
            'auth'=>'Login Error'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        Auth::logout();

        return redirect()->route('index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
