<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function create(){
		return view('auth/registration');
	}
	public function store(Request $request){
		$request->validate([
			'name'  => ['required', 'string'],
			'email' => ['required','string', 'email', 'unique:users'],
			'password' => ['required','confirmed', 'min:8'],
		]);
		
		
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		]);
		
		Auth::login($user);

		return redirect('/');
	}
}
