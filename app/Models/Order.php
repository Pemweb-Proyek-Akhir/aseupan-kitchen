<?php

// Model Order tes
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $fillable = ['id_cart', 'id_user', 'id_product', 'status', 'datetime'];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }
}
