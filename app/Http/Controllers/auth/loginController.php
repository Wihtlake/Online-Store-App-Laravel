<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
	public function create(){
		return view('auth/login');
	}
	public function store(Request $request){
		
		$request->validate([
			'email' => ['required','string', 'email'],
			'password' => ['required','string'],
		]);
		if(Auth::attempt($request->only('email', 'password'), $request->filled('remember'))){
			return redirect()->route('home')->with('success', 'вы успешно вошли в аккаунт, с возвращением! ');
		}
		else{
			return back()->withInput()->withErrors([
				'email' => 'email is not correct',
			]);
		}

		
	}

	public function destroy(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('home');
	}
}
