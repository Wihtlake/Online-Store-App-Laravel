@extends('layouts.layout')
@section('css', '/css/show.css')
@section('content')
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
<div class="navigation">
	<a href="{{ route('catalog') }}">Вернуться</a>
</div>

<div class="main_tovar">
	<div class="block_photo">
		<div class="main_side_photo">
			<img src="{{$Product->image}}" alt="">
		</div>
	</div>
	<div class="block_discription">
		<h1 class="discription_heading">{{ $Product->title }}</h1>
		<p class="discription_price">{{ $Product->price }} ₽/м²</p>
		
		<form action="{{ route('basket.add', ['id' => $Product->id])}}" method="post">
			@csrf
			@method('POST')
			<button class="discription_basket" type="submit">В корзину</button>
		</form>
		
	</div>
</div>
<div class="discription_discription">
	<p class="discription_feedback_heading">Описание:</p>
	<p class="discription_feedback">{{ $Product->description }}</p>
</div>
@endsection