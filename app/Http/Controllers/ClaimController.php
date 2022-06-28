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
            'claimer_address' => request('claimer_address'),
            'claimer_relation' => request('claimer_relation'),
            'dead_name' => request('dead_name'),
            'dead_date' => request('dead_date'),
            'dead_reason' => request('dead_reason'),
            'claimer_url' => request('claimer_url'),
            'status' => request('status'),
        ]);

        return response($response, 201);
    }

    //edit
    function action(Request $request) {
        $id = request('id');

        $response = Claim::where('id', $id)->update([
            'status' => request('status'),
        ]);

        return response($response, 200);
    }
}