<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Dependent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        
        $person = Person::where('user_id', $user->id)->first();
        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user' => $user,
            'person' => $person,
            'token' => $token,
        ];

        return response($response, 200);
    }

    function register(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|unique:users,email',
            'ic' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        
        $existed = Person::where('person_ic', $fields['ic'])->first();

        if($existed && $existed->user_id == "") {
            $person = Person::where('person_ic', $fields['ic'])->update([
                'user_id' => $user->id,
                'person_status' => 'new',
            ]);
        } else if($existed && $existed->user_id != "") {
            User::where('email', $fields['email'])->first()->delete();

            return response([
                'message' => ['User using this IC already exist!']
            ], 404);
        }   else {
            $person = Person::create([
                'user_id' => $user->id,
                'person_ic' => $fields['ic'],
                'person_status' => 'new',
            ]);
            $dependentsame = Dependent::where('dependent_ic', $fields['ic'])->delete();

        }     
        

        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user' => $user,
            'person' => $person,
            'token' => $token,
            'dependentsame' => $dependentsame,
        ];

        return response($response, 201);
    }

    // GET USER BY ID
    function getUser(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|string',
        ]);

        $user = User::where('id', $fields['id'])->first();
        $person = Person::where('user_id', $user->id)->first();

        $response = [
            'user' => $user,
            'person' => $person,
        ];

        return response($response, 200);
    }

    // -- COMPLETE PROFILE --
    function complete(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'mosque_id' => 'required|string',
            'village_id' => 'required|string',
            'person_name' => 'required|string',
            'person_ic' => 'required|string',
            'person_phone' => 'required|string',
            'person_address' => 'required|string',
            'person_occupation' => 'required|string',
            'person_status' => 'required|string',
        ]);

        if($request->hasFile('paymentProve') && $request->hasFile('addressProve')) {

            $userID = request('user_id');
          
            // payment
            $filenamewithextension1 = $request->file('paymentProve')->getClientOriginalName();
            $filename1 = pathinfo($filenamewithextension1, PATHINFO_FILENAME);
            $extension1 = $request->file('paymentProve')->getClientOriginalExtension();
            $filenametostore1 = $filename1.'_'.uniqid().'.'.$extension1;
            Storage::disk('ftp')->put('member_registration_payment/'.$userID.'/'.$filenametostore1, fopen($request->file('paymentProve'), 'r+'));

            // address
            $filenamewithextension2 = $request->file('addressProve')->getClientOriginalName();
            $filename2 = pathinfo($filenamewithextension2, PATHINFO_FILENAME);
            $extension2 = $request->file('addressProve')->getClientOriginalExtension();
            $filenametostore2 = $filename2.'_'.uniqid().'.'.$extension2;
            Storage::disk('ftp')->put('member_registration_address/'.$userID.'/'.$filenametostore2, fopen($request->file('addressProve'), 'r+'));
      

            $response = Person::where('user_id', $userID)->update([
                'mosque_id' => request('mosque_id'),
                'village_id' => request('village_id'),
                'person_name' => request('person_name'),
                'person_ic' => request('person_ic'),
                'person_phone' => request('person_phone'),
                'person_address' => request('person_address'),
                'person_occupation' => request('person_occupation'),
                'person_details_prove' => request('person_details_prove'),
                'person_payment_prove' => request('person_payment_prove'),
                'person_register_date' => request('person_register_date'),
                'person_status' => 'pending',
                'person_payment_prove' => '/images/member_registration_payment/'.$userID.'/'.$filenametostore1,
                'person_details_prove' => '/images/member_registration_address/'.$userID.'/'.$filenametostore2,
            ]);

            return response($response, 201);

        } 

        return response([
            'message' => 'Error no image',
            402,
        ]);
    }


    // -- LOG OUT --
    function logout(Request $request)
    {

        auth('sanctum')->user()->tokens()->delete();

        $response = [
            'isLogOut' => true,
        ];

        return response($response, 200);
    }
}