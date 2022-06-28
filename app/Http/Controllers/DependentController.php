<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependent;

class DependentController extends Controller
{
    //
        //get
        function getDependents(Request $request) {
            $user = request('user_id');
    
            $response = Dependent::where('user_id', $user)->get();
    
            return response($response, 200);
        }

        //add
        function addDependent(Request $request) {
            $user = request('user_id');
    
            $response = Dependent::create([
                'user_id' => $user,
                'mosque_id' => request('mosque_id'),
                'dependent_name' => request('dependent_name'),
                'dependent_relation' => request('dependent_relation'),
                'dependent_ic' => request('dependent_ic'),
                'dependent_phone' => request('dependent_phone'),
                'dependent_occupation' => request('dependent_occupation'),
                'dependent_address' => request('dependent_address'),
                'death_status' => request('death_status'),
                'death_date' => request('death_date'),
                'verify' => request('verify'),
                'verify_death' => request('verify_death'),
            ]);
    
            return response($response, 201);
        }
    
        //edit
        function editDependent(Request $request) {
            $id = request('id');
    
            $response = Dependent::where('id', $id)->update([
                'mosque_id' => request('mosque_id'),
                'dependent_name' => request('dependent_name'),
                'dependent_relation' => request('dependent_relation'),
                'dependent_ic' => request('dependent_ic'),
                'dependent_phone' => request('dependent_phone'),
                'dependent_occupation' => request('dependent_occupation'),
                'dependent_address' => request('dependent_address'),
                'death_status' => request('death_status'),
                'death_date' => request('death_date'),
                'verify' => request('verify'),
                'verify_death' => request('verify_death'),
            ]);
    
            return response($response, 200);
        }
    
        //delete
        function deleteDependent(Request $request) {
            $id = request('id');
    
            $response = Dependent::where('id', $id)->delete();
    
            return response($response, 200);
        }
}
