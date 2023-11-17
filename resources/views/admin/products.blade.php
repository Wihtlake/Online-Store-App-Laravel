@extends('layouts.layout')
@section('title', 'basket')
@section('css', '/css/admin_products.css')
@section('content')

<main>
	<div class="admin_products">
		<div class="width">
			<div class="admin_products_index">
				<a class="back" href="{{ route('admin.index') }}">назад</a>
				<div class="admin_heading"><h2>Товары</h2></div>
				<div class="admin_block">
					@if ($Products->count() > 0 )
					@foreach ($Products as $Product)
						<div class="admin_cart">
							<h2>{{ $Product->title }}</h2>
							<div class="admin_cart_second">
								<a href="{{ route('admin.edit', $Product->id) }}">Изменить</a>
								<form action="{{ route('admin.delete', $Product->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit">Удалить</button>
								</form>
							</div>
							
						</div>
					@endforeach
					@else
						<p style="text-align: center">Товаров пока что нету, <a href="{{ route('admin.create') }}">создать?</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</main>


@endsection


