<?php

namespace App\Http\Controllers;

use App\Models\BannerCampaign;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BannerCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public static function uploadBanner(UploadedFile $file, int $campaign_id)
    {

        $filename = time() . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename, 'public');

        $path = '/api/public/images/' . $filename;

        $HOST = $_SERVER['HTTP_HOST'];

        $banner = new BannerCampaign();
        $banner->campaign_id = $campaign_id;
        $banner->url = $HOST . $path;
        $banner->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BannerCampaign $bannerCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BannerCampaign $bannerCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BannerCampaign $bannerCampaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BannerCampaign $bannerCampaign)
    {
        //
    }
}
