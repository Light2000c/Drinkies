<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'product_name',
        'product_price',
        'product_category',
        'product_image',
        'product_description',
    ];

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function hasCart(User $user){
        return $this->cart->contains('user_id', $user->id);
    }
}
