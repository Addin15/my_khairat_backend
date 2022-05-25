<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $person = Person::create([
            'user_id' => $user->id,
            'person_ic' => $fields['ic'],
        ]);

        $token = $user->createToken('user-token')->plainTextToken;

        $response = [
            'user' => $user,
            'person' => $person,
            'token' => $token,
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
            'person_details_prove' => 'required|string',
            'person_payment_prove' => 'required|string',
            'person_status' => 'required|string',
        ]);

        $person = Person::where('user_id', request('user_id'))->update([
            'mosque_id' => request('mosque_id'),
            'village_id' => request('village_id'),
            'person_name' => request('person_name'),
            'person_ic' => request('person_ic'),
            'person_phone' => request('person_phone'),
            'person_address' => request('person_address'),
            'person_occupation' => request('person_occupation'),
            'person_details_prove' => request('person_details_prove'),
            'person_payment_prove' => request('person_payment_prove'),
            'person_status' => request('person_status'),
        ]);

        return response($person, 201);
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