<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait, HasFactory;

    protected $fillable = ['name', 'email', 'password', 'user_type'];

    const USER_TYPE_NORMAL = 0;
    const USER_TYPE_ADMIN = 1;

    public function userType()
    {
        return $this->user_type === self::USER_TYPE_ADMIN ? 'Admin' : 'User';
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
