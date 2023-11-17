@extends('layouts.layout')
@section('title', 'create')
@section('css', '/css/admin_create.css')

@section('content')
<main>
	<div class="admin">
		<div class="width">
			<div class="admin_main">
				<a class="back" href="{{ route('admin.products') }}">назад</a>
				<h2>Создать</h2>
				<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<label for="">Имя Картинки:</label>
					<input class="input" name="image" placeholder="Src Картинки:" value="/img/Products/">
					<label for="">Имя товара:</label>
					<input class="input" name="title" 	placeholder="Имя товара:">
					<label for="">Цена:</label>
					<input class="input" name="price" 	placeholder="Цена:">
					<label for="">Описание:</label>
					<input class="input" name="description" placeholder="Описание:">
					<label for="">Наличие:</label>
					<select name="in_stock" class="input">
						<option value="1" selected>В наличии</option>
						<option value="0">Нет в наличии</option>
					</select>
					<button type="submit">Создать</button>
				</form>
			</div>
		</div>
	</div>	

	</main>
@endsection

