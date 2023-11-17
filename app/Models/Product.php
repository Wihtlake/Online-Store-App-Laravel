<?php

namespace App\Models;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	public function carts() {
        // return $this->belongsToMany(Cart::class,'cart_product')->withPivot('quantity');
        return $this->hasMany(Cart::class);
    }
	protected $guarded = [];

	protected $fillable = [
		'image',
		'title',
		'price',
		'description',
		'category',
		'in_stock',
	];
}
