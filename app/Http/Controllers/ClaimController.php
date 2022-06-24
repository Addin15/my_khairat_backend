<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{
    //get
    function getClaim(request $request){
        $claim = request('mosque_id');

        $response = Claim::where('mosque_id',$claim)->get();

        return response($response,200);
    }

    //add
    function addClaim(Request $request) {
        $claim = request('claim_id');
        $mosque = request('mosque_id');
        
        $response = Claim::create([
            'claim_id' => $claim,
            'mosque_id'=> $mosque,
            'claimer_name' => request('claimer_name'),
            'claimer_ic' => request('claimer_ic'),
            'claimer_url' => request('claimer_url'),
            'status' => request('status'),
        ]);

        return response($response, 201);
    }
}