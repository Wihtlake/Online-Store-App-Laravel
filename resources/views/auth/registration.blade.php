@extends('layouts.layout')
@section('css', 'css/registration.css')
@section('content')
<div class="registration_main_block">
	<form class="reg_form" action="{{ route('registration') }}" method="POST">
		@csrf
		<h1 class="reg_header">Регистрация</h1>
		<input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Ваше имя:" autofocus required>
		@error('name')
			<p class="error">{{$message}}</p>
		@enderror
		<input class="reg_email"  type="text" name="email" placeholder="Email" required>
		@error('email')
			<p class="error">{{$message}}</p>
		@enderror
		<input class="reg_password" type="password" name="password" placeholder="Пароль" required>
		@error('password')
			<p class="error">{{$message}}</p>
		@enderror
		<input class="reg_password" type="password" name="password_confirmation" placeholder="Повторите пароль" required>
		<button class="reg_button" type="submit">Зарегистрироваться</button>
	</form>
</div>
@endsection