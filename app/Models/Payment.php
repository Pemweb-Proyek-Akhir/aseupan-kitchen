<?php

// Model Payment
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id_payment';
    protected $fillable = ['id_order', 'paymentMethods', 'datetime'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
