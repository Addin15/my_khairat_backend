<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Death;

class DeathController extends Controller 
{
    function getDependents(Request $request) {
        $dependent = request('dependent_id');

        $response = Death::where('dependent_id', $dependent)->get();

        return response($response, 200);
    }

    function addDeath(Request $request) {
        $dependent = request('dependent_id');

        $response = Death::create([
            'user_id' => request('user_id'),
            'dependent_id' => $dependent,
            'dependent_name' => request('dependent_name'),
            'dependent_ic' => request('dependent_ic'),
            'dependent_relation' => request('dependent_relation'),
            'dependent_phonenum' => request('dependent_phonenum'),
            'dependent_address' => request('dependent_address'),
            'dependent_deathdate' => request('dependent_deathdate'),
            'death_location' => request('death_location'),
            'death_causes' => request('death_causes'),
        ]);
        return response($response, 201);
    }
}
