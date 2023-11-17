<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
		$products = Product::all();
		$productsInStockCount = $products->where('in_stock', true)->count();
		return view('home.index' ,compact('products', 'productsInStockCount'));
	}

	public function store(Request $request){
		if ($request->isMethod('post')) {
			$user = auth()->user()->name; // Получение имени аутентифицированного пользователя
			$number = $request->input('number');
			$name = $request->input('name');
			$comment = $request->input('comment');
		Feedback::create([
            'user' => $user,
            'number' => $number,
            'name' => $name,
            'comment' => $comment,
        ]);
		return redirect()->route('home')->with('success', 'Заявка успешно отправлена.');
		}
	}
	public function subscribe(Request $request){
		$email = $request->input('email');
		$subscribe = '1';
		// Обновление поля `email_subscribe` в базе данных для текущего пользователя
		auth()->user()->update(['email_subscribe' => $subscribe]);
		return redirect()->back()->with('success', 'Вы успешно подписались на рассылку!');
	}
	public function unsubscribe(Request $request){
		$email = $request->input('email');
		$subscribe = '0';
		// Обновление поля `email_subscribe` в базе данных для текущего пользователя
		auth()->user()->update(['email_subscribe' => $subscribe]);
		return redirect()->back()->with('success', 'Вы успешно отподписались от рассылки!');
	}
}
