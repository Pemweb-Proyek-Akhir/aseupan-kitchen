<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\BannerCampaign;
use App\Models\Campaign;
use Brick\Math\BigInteger;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
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
                    BannerCampaignController::uploadBanner($file, $campaign->id);
                }
            }

            echo "gaada file";
        } catch (Exception $e) {
            return ResponseHelper::err($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $campaign = Campaign::banner()->get();
            return $campaign;
            // $campaign = Campaign::with('banners')->find(1);
            // return $campaign;
            // return $campaign;
            // return ResponseHelper::baseResponse("Berhasil mendapatkan response", 200, $campaign);
        } catch (Exception $err) {
            return $err->getMessage();
        }
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
