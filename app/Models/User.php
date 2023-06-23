<?php

// Model User
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['name', 'email', 'password', 'address', 'phoneNumber'];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id_user');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user');
    }
}
