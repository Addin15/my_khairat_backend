<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;

class VillageController extends Controller
{
    //get
    function get(Request $request) {
        $mosque = request('mosque_id');

        $response = Village::where('mosque_id', $mosque)->all();

        return response($response, 200);
    }

    //add
    function add(Request $request) {
        $mosque = request('mosque_id');

        $response = Village::create([
            'mosque_id' => $mosque,
            'village_name' => request('village_name'),
            'village_address' => request('village_address'),
        ]);

        return response($response, 201);
    }

    //edit
    function edit(Request $request) {
        $mosque = request('mosque_id');
        $id = request('village_id');

        $response = Village::where('mosque_id', $mosque)->where('village_id', $id)->update([
            'village_name' => request('village_name'),
            'village_address' => request('village_address'),
        ]);

        return response($response, 200);
    }

    //delete
    function delete(Request $request) {
        $mosque = request('mosque_id');
        $id = request('village_id');

        $response = Village::where('mosque_id', $mosque)->where('village_id', $id)->delete();

        return response($response, 200);
    }
}