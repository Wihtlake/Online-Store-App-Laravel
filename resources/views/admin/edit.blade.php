@extends('layouts.layout')
@section('title', 'basket')
@section('css', '/css/admin_create.css')
@section('content')
<main>
	<div class="admin">
		<div class="width">
		
			<div class="admin_main">
					<a class="back" href="{{ route('admin.products') }}">назад</a>
				<h2>изменить</h2>
				<form action="{{ route('admin.update', ['Product' => $Product->id])  }}" method="POST">
					@csrf
					@method('PUT')
					<label for="">Имя Картинки:</label>
					<input class="input" name="image" placeholder="Src Картинки:  " value="{{ $Product->image }}">
					<label for="">Имя товара:</label>
					<input class="input" name="title" 	placeholder="Имя товара:"	 value="{{ $Product->title }}"	>
					<label for="">Цена:</label>
					<input class="input" name="price" 	placeholder="Цена:"	 value="{{ $Product->price }}"	>
					<label for="">Описание:</label>
					<input class="input" name="description" placeholder="Описание:" value="{{ $Product->description }}"	>
					<label for="">Наличие:</label>
					<select name="in_stock" class="input">
							@if ( $Product->in_stock )
							
								<option value="{{ $Product->in_stock }}" selected>	В наличии</option>
								<option value="0">Нет в наличии</option>

							@else
								<option value="{{ $Product->in_stock }}" selected>Нет наличии</option>
								<option value="1">В наличии</option>
							@endif
					</select>
					<button type="submit">Сохранить</button>
				</form>
			</div>
		</div>
	</div>	

	</main>
@endsection

@section('js')
<script>
    image.onchange = function(event) {
    var target = event.target;

    if (!FileReader) {
        alert('FileReader не поддерживается — облом');
        return;
    }

    if (!target.files.length) {
        alert('Ничего не загружено');
        return;
    }

    var fileReader = new FileReader();
    fileReader.onload = functino() {
        img1.src = fileReader.result;
    }

    fileReader.readAsDataURL(target.files[0]);
}
</script>

@endsection
