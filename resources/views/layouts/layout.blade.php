<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="@yield('css')">
	<link rel="stylesheet" href="/css/layout.css">
	<title>@yield('title')</title>
</head>
<body>

	<div class="header">
		<div class="header_width_grid">
			<div class="header_block">
				<div class="logo"><a href="{{ route('home') }}"><img src="/img/____________free-file (1) 1.png" alt="logo"></a></div>
				<div class="menu">
					<ul class="menu_ul_block">
						<li class="menu_list_block"><a href="{{ route('home') }}" class="menu_link_block">Главная страница</a></li>
						<li class="menu_list_block"><a href="{{ route('catalog') }}" class="menu_link_block">Каталог товаров</a></li>
						<li class="menu_list_block"><a href="{{ route('home', ['#page_contact']) }} " class="menu_link_block">Контакты</a></li>
						<li class="menu_list_block"><a href="{{ route('basket') }}" class="menu_link_block">Корзина</a>
						<a href="#" class="menu_link_block ">
							@auth
								@php
									$user_auth = auth()->id();	
									$card_sum = $carts->where('user_id', $user_auth)->sum('quantity');
								@endphp
								@if ($card_sum != 0)
									{{ $card_sum }}
								@endif
							@endauth
						</a></li>
					</ul>
				</div>
				<div class="login_register">
					<ul class="login_register_ul_block">
						@guest
						<li class="login_register_list_block"><a href="{{ route('login') }}" class="login_register_link_block">Вход</a></li>
						<li class="login_register_list_block"><a href="{{ route('registration') }}" class="login_register_link_block">Регистрация</a></li>
						
						@endguest
		
						@auth
						@if ( auth()->user()->admin)
							<li class="login_register_list_block"><a href="{{ route('admin.index') }}" class="login_register_link_block">Администратор <a class="login_register_link_block" href="{{ route('admin.feedback') }}">
								@if ($feedback->count() != 0)
								{{ $feedback->count() }}
							@endif</a></a></li>
						@else
							<li class="login_register_list_block"><a href="#" class="login_register_link_block"> {{auth()->user()->name}}</a></li>
						@endif
							<li class="login_register_list_block"><a href="{{ route('logout') }}" class="login_register_link_block">Выйти</a></li>
						@endauth

							

					</ul>
				</div>
			</div>
		</div>
	</div>
	<main class="layout_main">
		@yield('content')
	</main>
	

	<div class="footer">
		<div class="footer_info_block">
			<div class="footer_info_card">
				<h1>О компании</h1>
				<p>
					СтройМастер - компания, 
					специализирующаяся на продаже 
					строительных материалов и товаров для ремонта. 
					У нас вы найдете все необходимое для строительства 
					и отделки вашего дома. Мы предлагаем только 
					качественные товары от проверенных производителей.
				</p>
			</div>
			<div class="footer_info_card">
				<h1>Социальные сети</h1>
				<p><a href="https://www.instagram.com/"target="_blank">Мы в Instagram</a></p>
				<p><a href="https://ru-ru.facebook.com/"target="_blank">Мы в Facebook</a></p>
				<p><a href="https://vk.com/"target="_blank">Мы в VK</a></p>
			</div>
			<div class="footer_info_card">
				<h1>Контакты</h1>
				<p>Адрес: ул. Строительная, д. 10, г. Москва</p>
				<p>Телефон: <a href="tel:74951234567">+7 (495) 123-45-67</a></p>
				<p>Email: <a href="mailto:info@stroymaster.ru">info@stroymaster.ru</a> </p>
			</div>
			<div class="footer_info_card">@auth
				@if (auth()->user()->email_subscribe == 0)
					<form action="{{ route('subscribe') }}" method="POST">
						@csrf
						
							<input class="input_email" type="text" name="email" placeholder="Введите ваш Email" value="{{auth()->user()->email}}" required readonly>
						
						<button class="button_email" type="submit">Подписаться на рассылку</button>
					</form>
					@else
					<form action="{{ route('unsubscribe') }}" method="POST">
						@csrf
							<input class="input_email" type="text" name="email" placeholder="Введите ваш Email" value="{{auth()->user()->email}}" required readonly>
						<button class="button_email" type="submit">отписаться от рассылки</button>
					</form>
					@endif
					@endauth
				<p>
					Оставьте свой email, чтобы получать информацию о новинках, 
					скидках и акциях от нашей компании.
					@guest
						<p>Для подписки на рассылку, необходимо <a href="{{ route('registration') }}" style="text-decoration: underline">зарегистрироваться </a></p>
					@endguest
				</p>
			</div>
		</div>
		
	</div>

	@yield('js')
</body>
</html>