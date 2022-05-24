<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grave;
use App\Models\GraveLot;

class GraveController extends Controller
{
    //get
    function getGraves(Request $request) {
        $mosque = request('mosque_id');

        $response = Grave::where('mosque_id', $mosque)->get();

        return response($response, 200);
    }

    //add
    function addGrave(Request $request) {
        $mosque = request('mosque_id');

        $response = Grave::create([
            'mosque_id' => $mosque,
            'grave_name' => request('grave_name'),
            'grave_address' => request('grave_address'),
        ]);

        return response($response, 201);
    }

    //edit
    function editGrave(Request $request) {
        $id = request('id');

        $response = Grave::where('id', $id)->update([
            'grave_name' => request('grave_name'),
            'grave_address' => request('grave_address'),
        ]);

        return response($response, 200);
    }

    //delete
    function deleteGrave(Request $request) {
        $id = request('id');

        $response = Grave::where('id', $id)->delete();

        return response($response, 200);
    }

    //get
    function getLots(Request $request) {
        $mosque = request('mosque_id');

        $response = GraveLot::where('mosque_id', $mosque)->get();

        return response($response, 200);
    }

    //add
    function addLot(Request $request) {

        $response = GraveLot::create([
            'grave_id' => request('grave_id'),
            'lot_number' => request('lot_number'),
            'lot_gender'=> request('lot_gender'),
        ]);

        return response($response, 201);
    }

    //edit
    function editLot(Request $request) {
        $id = request('id');

        $response = GraveLot::where('id', $id)->update([
            'user_id' => request('user_id'),
            'lot_number' => request('lot_number'),
            'lot_gender'=> request('lot_gender'),
        ]);

        return response($response, 200);
    }

    //delete
    function deleteLot(Request $request) {
        $id = request('id');

        $response = GraveLot::where('id', $id)->delete();

        return response($response, 200);
    }
}