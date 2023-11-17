@extends('layouts.layout')
@section('css', 'css/catalog.css')
@section('content')
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
<div class="sort_main_block">
	<div class="sort_product_first">
		<h2>Товаров:
			{{ $productsInStockCount }}
		</h2>
	</div>
	<div class="sort_product_second">
		<h3 class="title_sort">Сортировать по:</h3>
		<ul class="sorted_by">
			@if ($sort != 'price_desc' && $sort != 'price_asc')
							<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'price_asc']) }}">По цене</a></li>
							@endif
							@if ($sort == 'price_desc')
								<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'price_asc']) }}">По цене &#8593;</a></li>
							@endif
							@if ($sort == 'price_asc')
								<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'price_desc']) }}">По цене &#8595;</a></li>
							@endif
							@if ($sort != 'title_desc' && $sort != 'title_asc')
							<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'title_asc']) }}">По имени</a></li>
							@endif
							@if ($sort == 'title_desc')
								<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'title_asc']) }}">По имени &#8593;</a></li>
							@endif
							@if($sort == 'title_asc')
								<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'title_desc']) }}">По имени &#8595;</a></li>
							@endif

							
							@if ($sort !== 'default')
							<li class="sort_by"><a  href="{{ route('catalog', ['sort' => 'default']) }}">По умолчанию </a></li>
							@endif
		</ul>
	</div>
</div>
<div class="popular_second_block">
	<div class="popular_cards_block">
		@if ($productsInStockCount > 0 )
		@foreach ($products as $product)
		@if ($product->in_stock)

		<div class="popular_card_block">
			<div class="popular_item_card_block">
				<a href=" {{route('catalog.show', $product->id)}}">
					<img class="popular_item_card_block_img" src="{{$product->image}}" alt="">
				</a>
			</div>
			<div class="popular_item_card_block">
				<h2><a href="{{route('catalog.show', $product->id)}}">{{ $product->title }}</a></h2>
			</div>
			<div class="popular_item_card_block">
				<p>{{ $product->price }}₽</p>
				<form action="{{ route('basket.add', ['id' => $product->id])}}" method="post">
					@csrf
					@method('POST')
					<button class="popular_basket" type="submit">В корзину</button>
				</form>
			</div>
		</div>
		@endif
		@endforeach
		@else
			<p style="text-align: center; height:100vh;">Нет товаров</p>
		@endif

	</div>
</div>
@endsection

@section('js')

	
@endsection

