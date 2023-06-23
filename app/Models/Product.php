<?php

// Model Product
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = ['name', 'type', 'detail', 'price'];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_product');
    }
}
