@extends('layouts.layout')
@section('css', '/css/basket.css')
@section('content')
<div class="basket_main_block">
	<div class="basket_heading">
		<h1>Корзина</h1>
	</div>

	<div class="basket_block">
		<div class="basket_block_first">
			@php
				$user_aut = auth()->id();	
				$card_sum = $carts->where('user_id', $user_aut)->sum('quantity');
			@endphp
			@if ($card_sum == 0)
				<p>Ваша корзина пуста</p>
			@endif
			@foreach ($carts as $cart)
				@if ($user_auth->id ==  $cart->user_id)
					<div class="item_main">
						<img src="{{$cart->products->image}}" alt="">
							<div class="basket_name_count">

								<div class="basket_name">
									<a href="{{ route('catalog.show', $cart->products->id) }}">{{$cart->products->title}}</a>
									<p id="product_price">{{$cart->products->price}}р</p>
								</div>

								<div class="basket_count">
									<div>
										<form class="basket_delete_item" action="{{ route('basket.destroy', $cart) }}" method="POST">
											@csrf
											@method('DELETE')
											<img class="delete_photo" src="img/icons/Rectangle 35.png" >
											<button class="delete">Удалить</button>
										</form>
									</div>
									
									<div class="basket_count_item">
											<form class="count_item plus" id="product_count_plus" action="{{ route('basket.minus', $cart) }}" method="POST">
												@csrf
												<button type="submit"><img src="img/icons/Rectangle 33.png" alt=""></button>
											</form>
											
											<div class="count_item count" ><h2 id="product_count_sum">{{ $cart->quantity }}</h2></div>
											<form class="count_item minus" id="product_count_minus" action="{{ route('basket.plus', $cart) }}" method="POST">
												@csrf
												<button type="submit"><img src="img/icons/Rectangle 32.png" alt=""></button>
											</form>
									</div>
								</div>
							</div>
					</div>
					@endif
				@endforeach
					
				

		</div>	
		<div class="basket_block_second">
			<h2 id="sum_total">Сумма: {{ $carts->where('user_id', $user_auth->id)->sum(function ($cart) {
				return $cart->quantity * $cart->products->price;
			}) }} Р</h2>
			<p>Товаров: {{ $carts->where('user_id', $user_auth->id)->sum(function ($cart) {
				return $cart->quantity;
			}) }}</p>
			<a href="">Оформить заказ</a>
		</div>
	</div>
	
</div>
@endsection