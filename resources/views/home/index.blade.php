@extends('layouts.layout')
@section('css', 'css/style.css')
@section('css', 'css/style_adaptive.css')
@section('content')
			@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif

<div class="width_2">
	<div class="slider">
		<div class="slider_main_card_slide">
			<div class="slider_card">
				
				<div class="slider_content">
					<h1>Строительные материалы от производителя!</h1>
					<p>Надежное качество<br>и доступные цены!</p>
					<a href="{{route('catalog')}}">Каталог товаров</a>
				  </div>
				  <div class="slider_photo">
					<img src="/img/Rectangle 112.png" alt="">
				</div>
			</div>
		</div>
	</div>

	<div class="catalog">
		<div class="catalog_first_block">
			<h1>Наши товары</h1>
		</div>

		<div class="catalog_second_block">
			<div class="catalog_cards_block">

				<div class="catalog_card_block">
					<div class="card_text">
						<h3>Напольные покрытия</h3>
						<p>Превратите свой дом в уютное гнездышко с нашими напольными покрытиями</p>
					</div>
					<div class="card_photo">
						<img src="/img/categoties/Rectangle 21-1.png" alt="">
					</div>
				</div>
				<div class="catalog_card_block">
					<div class="card_text">
						<h3>Материалы для отделки</h3>
						<p>Сделайте ваш дом, еще более уютным с нашими материалами</p>
					</div>
					<div class="card_photo">
						<img src="/img/categoties/Rectangle 20-1.png" alt="">
					</div>
				</div>
				<div class="catalog_card_block">
					<div class="card_text">
						<h3>Электротовары</h3>
						<p>Ваш дом будет надежен, и безопасен с нашими элетротоварами</p>
					</div>
					<div class="card_photo">
						<img src="/img/categoties/Rectangle 20.png" alt="">
					</div>
				</div>
				<div class="catalog_card_block">
					<div class="card_text">
						<h3>Сантехника</h3>
						<p>Превратите свой дом в уютное гнездышко с нашими напольными покрытиями</p>
					</div>
					<div class="card_photo">
						<img src="/img/categoties/Rectangle 21.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<div class="catalog_thrid_block">
			<a class="catalog_thrid_link" href="{{ route('catalog') }}">ПОДРОБНЕЕ</a>
		</div>
	</div>


	<div class="popular">
		<div class="popular_first_block">
			<h1>Популярные товары</h1>
		</div>
		<div class="popular_second_block">
			<div class="popular_cards_block">
				@if( $productsInStockCount > 0)

				@foreach ($products->take(4) as $product)
					@if ($product->in_stock)
					<div class="popular_card_block">
						<div class="popular_item_card_block popular_item_card_block_image">
							<a href="{{route('catalog.show', $product->id)}}">
								<img class="popular_item_card_block_img" src="{{ $product->image }}" alt="">
							</a>
						</div>
						<div class="popular_item_card_block">
							<h2><a href="{{route('catalog.show', $product->id)}}"> {{ $product->title }} {{ $product->in_stock }}</a></h2>
						</div>
						<div class="popular_item_card_block">
							<p>{{ $product->price }}₽</p>
							<form action="{{ route('basket.add', ['id' => $product->id])}}" method="post">
								@csrf
								@method('POST')
								<button class="popular_basket" type="submit">В корзину </button>
							</form>
						</div> 
					</div>
					@endif
				@endforeach
				@else
					<p style="text-align: center; height:10vh;">Нет товаров</p>
				@endif
			</div>
		</div>
	</div>

	<div class="special">
		<div class="special_first_block">
			<h1>Специальные предложения</h1>
		</div>
		<div class="special_second_block">
			<div class="special_second_offers_block">
				<div class="special_second_offers_block_left_offer">
					<h2>Зарегистрируйся на нашем сайте</h2>
					<p>Получи консультацию в подарок!</p>
					<a href="{{ route('registration') }}">Регистрация</a>
				</div>
			</div>
		</div>
	</div>


	<div class="contact" id="page_contact">
		<div class="contact_first_block">
			<div class="contact_heading_block">
				<h1>Контакты</h1>
			</div>
			<div class="contact_first_block_info">
				<div class="contact_first_block_info_card">
					<h2>Номер телефона компании</h2>
					<p><a href="tel:74951234567">+7 (495) 123-45-67</a></p>
				</div>
				<div class="contact_first_block_info_card">
					<h2>Электронная почта</h2>
					<p><a href="mailto:info@stroymaster.ru"target="_blank">info@stroymaster.ru</a> </p>
				</div>
				<div class="contact_first_block_info_card">
					<h2>Адрес</h2>
					<p>ул. Строительная, д. 10, г. Москва</p>
				</div>
			</div>
		</div>
		<div class="contact_second_block" id="feedback">
			
			<h1>Обратная связь</h1>
			<div class="contact_form_block">
				<form action="{{ route('store') }}" method="POST">
					@csrf
					@method('POST')
					@if (auth()->check())
					<input class="contact_2" type="number" name="number" placeholder="Номер телефона" required min="80000000000" max="89999999999">
					<input class="contact_2" type="text" name="name" placeholder="Ваше имя" required >
					<textarea class="contact_2" name="comment"  placeholder="Комментарий" required ></textarea>
					<button class="contact_button" type="submit">Оставить заявку</button>	
					@else
						<button class="contact_button disabled_button" disabled>Оставить заявку</button>	
						<p style="margin-top: 20px">Для оставления заявки, необходимо <a href="{{ route('registration') }}">зарегистрироваться</a> на нашем сайте.</p>
					@endif
				</form>

			</div>
		</div>
	</div>
</div>

	@endsection
