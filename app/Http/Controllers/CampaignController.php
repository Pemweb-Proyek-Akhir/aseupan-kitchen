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

            return ResponseHelper::baseResponse("Berhasil membuat campaign", 200, $campaign);
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
            $campaigns = DB::select("SELECT c.id, c.name, c.target, c.status, c.description, b.url FROM campaigns c JOIN banner_campaigns b ON c.id = b.campaign_id;");

            $combinedCampaigns = [];

            foreach ($campaigns as $campaign) {
                $id = $campaign->id;

                if (!array_key_exists($id, $combinedCampaigns)) {
                    $combinedCampaigns[$id] = [
                        'id' => $id,
                        'name' => $campaign->name,
                        'target' => $campaign->target,
                        'status' => $campaign->status,
                        'description' => $campaign->description,
                        'thumbnail' => [$campaign->url]
                    ];
                } else {
                    $combinedCampaigns[$id]['thumbnail'][] = $campaign->url;
                }
            }

            // Convert the combined campaigns array to a sequential array
            $combinedCampaigns = array_values($combinedCampaigns);

            return $combinedCampaigns;
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
