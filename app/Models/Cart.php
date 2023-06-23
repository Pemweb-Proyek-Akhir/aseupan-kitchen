<?php

// Model Cart
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id_cart';
    protected $fillable = ['id_user', 'id_product'];
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id_product');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id_cart');
    }
}
