<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPackageTable extends Migration
{
    public function up()
    {
        Schema::create('campaign_package', function (Blueprint $table) {
            $table->integer('campaign_id');
            $table->integer('package_id');

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaign_package');
    }
}
