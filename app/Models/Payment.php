<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount', 'status', 'payment_method'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
