<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCampaign extends Model
{
    protected $table = 'Banner_Campaign';
    protected $fillable = ['campaign_id', 'url'];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
