@extends('layouts.layout')
@section('title', 'feedback')
@section('css', '/css/admin_feedback.css')
@section('content')
	<div class="admin_products">
		<div class="width">
			<div class="admin_products_index">
				<a class="back" href="{{ route('admin.users') }}">назад</a>
				<div class="admin_heading"><h2>заявки</h2></div>
				</div>
				
				<div class="admin_block">
					@foreach ($feedbacks as $feedback)
						<div class="admin_cart">
							<div class="admin_item"><h2>Номер обращения: {{ $feedback->id }}</h2></div>	
							<div class="admin_item"><h2>имя пользователя: {{ $feedback->user }}</h2></div>	
							<div class="admin_item"><h3>имя в анкете: {{ $feedback->name }}</h3></div>
							<div class="admin_item"><p>Номер телефона: <a href="tel:{{ $feedback->number }}"> {{ $feedback->number }}</a></div></p>
							<div class="admin_item"><p>обращение: {{ $feedback->comment }}</p></div>
							<form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button class="popular_basket">	Обработанно</button>
						
								
							</form>
						</div>
						
					@endforeach
				</div>
			</div>
		</div>
	</div>


@endsection
