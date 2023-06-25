<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;
    // protected $fillable = ['name', 'target', 'status'];

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class, 'campaign_id');
    }
}
