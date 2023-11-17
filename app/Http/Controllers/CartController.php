<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function index(Request $request){
		$user_auth = auth()->user();
		$carts = Cart::with('products')->get();
		return view('basket/basket', compact('carts', 'user_auth'));
	}


	public function add(Request $request, $id){
		$user_id = auth()->user()->id;
        $quantity = $request->quantity;
		$product_id = $id;
		$cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();
		if ($cart) {
			// Если запись корзины уже существует, увеличить количество
			$cart->quantity += 1;
			$cart->save();
		} else {
			// Если запись корзины не существует, создать новую запись
			$cart = Cart::create([
				'user_id' => $user_id,
				'product_id' => $product_id,
			]);
		}
	
		return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
	}
	public function checkout(Request $request)
{
    // Получение текущего пользователя
    $user = auth()->user();

    // Получение данных из корзины
    $carts = Cart::where('user_id', $user->id)->with('products')->get();

    // Создание записи о заказе
    $order = Order::create([
        'user_id' => $user->id,
        // Другие данные о заказе, такие как адрес доставки, контактные данные и т.д.
    ]);

    // Добавление товаров из корзины в заказ
    foreach ($carts as $cart) {
        $order->items()->create([
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            // Другие данные о каждом товаре в заказе
        ]);
    }

    // Удаление записей из корзины
    Cart::where('user_id', $user->id)->delete();

    // Дополнительная логика, такая как отправка уведомления о заказе

    // Перенаправление пользователя на страницу подтверждения заказа
    return redirect()->route('order.confirmation')->with('success', 'Ваш заказ успешно оформлен!');
}
	public function destroy($id){
		$cart = Cart::findOrFail($id);
		$cart->delete();
		return redirect()->route('basket');
	}


	public function minus($id){
		$cart = Cart::find($id);

		if($cart->quantity > 1){
		$cart->quantity -= 1;
		}
		$cart->save();
		return redirect()->route('basket');
	}
	public function plus($id){
		$cart = Cart::find($id);
		$cart->quantity += 1;
		$cart->save();
		return redirect()->route('basket');
	}


}
