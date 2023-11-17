@extends('layouts.layout')
@section('css', 'css/login.css')
@section('content')
<div class="registration_main_block">
	<form class="reg_form" action="{{ route('login') }}" method="POST">
		@csrf
		<h1 class="reg_header">Вход</h1>
		<input class="reg_input"  type="text" name="email" placeholder="Email" required> 
		@error('email')
			<p class="error">{{$message}}</p>
		@enderror
		<input class="reg_input" type="password" name="password" placeholder="Пароль" required>
		<div class="reg_qest">
			<div class="reg_chek_block">
				<label>
					<input class="reg_check" type="checkbox" name="remember">
					Запомнить меня
				</label>
			</div>
			
			<div class="reg_password_block">
				<a href="#">Забыли параль?</a>
			</div>
		</div>
		<button class="reg_button" type="submit">Войти</button>
	</form>
</div>
@endsection