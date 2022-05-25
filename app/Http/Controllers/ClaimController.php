<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mode\Claim;

class ClaimController extends Controller
{
    //get
    function get(request $request){
        $claim = request('claim_id');

        $response = Claim::where('claim_id',$claim)->all();

        return response($response,200);
    }
}
