<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
		return view('admin/index');
	}
	public function create(){
		return view('admin/create');
	}
	public function store(Request $request, Product $Product){
		$Product->create($request->all());
        return view('admin.create', compact('Product'));
	}
	
	public function products(){
		$Products = Product::all();
		return view('admin/products', compact('Products'));
	}
	public function edit(Request $request, Product $Product){
		return view('admin/edit', compact('Product'));
		
	}
	public function update(Request $request, Product $Product){
		$Product->update($request->all());
        return redirect()->route('admin.edit', compact('Product'));
		
	}

	public function destroy(Product $Product){
		$Product->delete();
        return redirect()->route('admin.products');
	
	}
	public function users(){
		$feedback = Feedback::all();
		$user_auth = auth()->user();
		$users = User::all();
		return view('admin.users', compact('user_auth', 'users', 'feedback'));
	}
	public function feedback(){
		$feedbacks = Feedback::all();
		return view('admin.feedback', compact('feedbacks'));

	}
	public function feedback_destroy(Feedback $Feedback){
		$Feedback->delete();
        return redirect()->route('admin.feedback');
	
	}
}
