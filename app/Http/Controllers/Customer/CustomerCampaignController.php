<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Package;

class CustomerCampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        return view('customer.campaigns.index', compact('campaigns'));
    }

    public function show($campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        $packages = Package::all();

        return view('customer.campaigns.show', compact('campaign', 'packages', 'campaignId'));
    }
}
