@extends('layouts.layout')
@section('title', 'Users')
@section('css', '/css/admin_products.css')
@section('content')
	<div class="admin_products">
		<div class="width">
			<div class="admin_products_index">
				<a class="back" href="{{ route('admin.index') }}">назад</a>
				<div class="admin_heading"><h2>Пользователи</h2></div>
				<div class="admin_heading_feedback">
					<div class="admin_feedback">
							<a href="{{ route('admin.feedback') }}" style="text-align: center">Заявки: {{ $feedback->count() }}</a> 
					</div>
				</div>
				
				<div class="admin_block">
					@foreach ($users as $user)
						<div class="admin_cart">
							<h2>{{ $user->name }}</h2>
							<div class="admin_cart_second">
								@if ($user->admin == 1)
									<h2>Admin</h2>
								@else
								<h2>User</h2>
								@endif
							</div>
							
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


@endsection


