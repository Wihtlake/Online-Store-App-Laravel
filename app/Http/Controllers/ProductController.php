<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function catalog(Request $request){
		$sort = $request->query('sort', 'default');
		$category = $request->query('category', 'all');
		$query = Product::query();


		switch($sort){
			case 'price_asc':
				$query->orderBy('price', 'asc');
			break;

			case 'price_desc':
				$query->orderBy('price', 'desc');
			break;

			case 'title_asc':
				$query->orderBy('title', 'asc');
			break;
			case 'title_desc':
				$query->orderBy('title', 'desc');
			break;
			default:
				break;
			}
	if($category !== 'all'){
		$query->where('category', $category);
	}
			switch($category){
				case 'console':
					$query->where('category', 'console');
					break;
				case 'games':
					$query->where('category', 'games');
					break;
				case 'accessories':
					$query->where('category', 'accessories');
				break;
				default:
				break;
			}
		$products = $query->get();
		$productsInStockCount = $products->where('in_stock', true)->count();
		return view('products/catalog', compact('products', 'sort', 'category', 'productsInStockCount'));
	}
	public function show(Request $request, Product $Product){
		return view('products/show', compact('Product'));
	}
}
