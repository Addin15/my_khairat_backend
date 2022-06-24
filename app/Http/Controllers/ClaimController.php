<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mode\Claim;

class ClaimController extends Controller
{
    //get
    function getClaim(request $request){
        $claim = request('claim_id');

        $response = Claim::where('claim_id',$claim)->all();

        return response($response,200);
    }

    //add
    function addClaim(Request $request) {
        $claim = request('claim_id');

        $response = Grave::create([
            'claimer_id' => $claim,
            'claimer_name' => request('claimer_name'),
            'claimer_ic' => request('claimer_ic'),
            'claimer_village' => request('claimer_village'),
            'claimer_url' => request('grave_url'),
            'status' => request('status'),
        ]);

        return response($response, 201);
    }
}