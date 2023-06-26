<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name', 'description', 'target', 'status', 'current'
    ];

    public function banners()
    {
        return $this->hasMany(BannerCampaign::class, 'campaign_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'campaign_package');
    }
}
