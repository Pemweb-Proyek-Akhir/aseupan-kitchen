<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\BannerCampaign;
use App\Models\Campaign;
use Brick\Math\BigInteger;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'banner.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => "required",
                "description" => "required",
                'target' => 'required|integer'
            ]);

            $campaign = new Campaign();
            $campaign->name = $validated['name'];
            $campaign->description = $validated['description'];
            $campaign->target = $validated['target'];

            $campaign->save();

            if ($request->hasFile('banner')) {
                $files = $request->file('banner');
                // $fil

                foreach ($files as $file) {
                    $this->uploadBanner($file, $campaign->id);
                }
            }

            echo "gaada file";
        } catch (Exception $e) {
            return ResponseHelper::err($e->getMessage());
        }
    }

    private function uploadBanner(UploadedFile $file, int $campaign_id)
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
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
