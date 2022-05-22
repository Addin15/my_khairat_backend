<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommitteeController extends Controller
{
    // -- LOGIN --
    function login(Request $request)
    {
        $user = Committee::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('committee-token')->plainTextToken;
        $profile = CommitteeProfile::where('mosque_id', $user->id)->first();

        $response = [
            'user' => $user,
            'profile' => $profile,
            'token' => $token,
        ];

        return response($response, 200);
    }

    // -- REGISTER --
    function register(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = Committee::create([
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $profile = CommitteeProfile::create([
            'mosque_id' => $user->id,
        ]);

        $token = $user->createToken('committee-token')->plainTextToken;

        $response = [
            'user' => $user,
            'profile' => $profile,
            'token' => $token,
        ];

        return response($response, 201);
    }

    // -- COMPLETE PROFILE --
    function complete(Request $request)
    {
        $fields = $request->validate([
            'mosque_id' => 'required',
            'mosque_name' => 'required|string',
            'mosque_phone' => 'required|string',
            'mosque_address' => 'required|string',
        ]);

        $profile = CommitteeProfile::where('mosque_id', request('mosque_id'))->update([
            'mosque_name' => request('mosque_name'),
            'mosque_phone' => request('mosque_phone'),
            'mosque_address' => request('mosque_address'),
        ]);

        return response($profile, 201);
    }

    // -- LOG OUT --
    function logout(Request $request)
    {

        auth('sanctum')->user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}