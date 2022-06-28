<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeProfile;
use App\Models\CommitteePayment;
use App\Models\Dependent;
use App\Models\Village;
use App\Models\Person;
use App\Models\Grave;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DateTime;

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
    function store(Request $request)
    {
        // $fields = $request->validate([
        //     'mosque_id' => 'required',
        //     'mosque_name' => 'required|string',
        //     'mosque_phone' => 'required|string',
        //     'mosque_postcode' => 'required|string',
        //     'mosque_state' => 'required|string',
        //     'mosque_address' => 'required|string',
        //     'mosque_registration_prove' => 'required',
        // ]);

        $mosqueID = request('mosque_id');

        if($request->hasFile('image')) {
          
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
      
            //Upload File to external server
            Storage::disk('ftp')->put('committee_registration_prove/'.$filenametostore, fopen($request->file('image'), 'r+'));
      
            $dt = new DateTime("+1 month");
            //Store $filenametostore in the database
            $profile = CommitteeProfile::where('mosque_id', $mosqueID)->update([
                'mosque_name' => request('mosque_name'),
                'mosque_phone' => request('mosque_phone'),
                'mosque_address' => request('mosque_address'),
                'mosque_postcode' => request('mosque_postcode'),
                'mosque_state' => request('mosque_state'),
                'mosque_bank_name' => request('mosque_bank_name'),
                'mosque_bank_owner_name' => request('mosque_bank_owner_name'),
                'mosque_bank_no' => request('mosque_bank_no'),
                'mosque_monthly_fee' => request('mosque_monthly_fee'),
                'mosque_status' => 'pending',
                'mosque_expire_month' => $dt->format("m"),
                'mosque_expire_year' => $dt->format("Y"),
                'mosque_registration_prove' => '/images/committee_registration_prove/'.$filenametostore,
            ]);

            return response($profile, 201);
        }

        return response([
            'message' => 'no image',
        ], 200);

        //return response($profile, 201);
    }

    public function getPlans(Request $request) {
        $mosqueID = request('mosque_id');

        $response = CommitteePayment::where('committee_id', $mosqueID)->get();

        return response($response, 200);
    }

    public function makePayment(Request $request) {
        $mosqueID = request('mosque_id');

        if($request->hasFile('image')) {
          
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
      
            //Upload File to external server
            Storage::disk('ftp')->put('committee_payment_prove/'.$mosqueID.'/'.$filenametostore, fopen($request->file('image'), 'r+'));
      
            //Store $filenametostore in the database
            $payment = CommitteePayment::create([
                'committee_id' => $mosqueID,
                'remark' => request('remark'),
                'is_done' => 0,
                'is_rejected' => 0,
                'prove_url' => '/images/committee_payment_prove/'.$mosqueID.'/'.$filenametostore,
            ]);


            return response($payment, 201);
        }

        return response([
            'message' => 'Error no image',
            402,
        ]);
    }

    public function editBankDetails(Request $request) {
        $request->validate([
            'mosque_id' => 'required',
            'bank_name' => 'required',
            'bank_owner_name' => 'required',
            'bank_account_no' => 'required',
            'monthly_fee' => 'required',
        ]);

        $response = CommitteeProfile::where('mosque_id', request('mosque_id'))->update([
            'mosque_bank_name' => request('bank_name'),
            'mosque_bank_owner_name' => request('bank_owner_name'),
            'mosque_bank_no' => request('bank_account_no'),
            'mosque_monthly_fee' => request('monthly_fee'),
        ]);

        return response($response, 200);
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

    function getMosques(Request $request)
    {
        $response = CommitteeProfile::all();

        return response($response, 200);
    }

    function getMosque(Request $request)
    {
        $mosqueID = request('mosqueID');

        $response = CommitteeProfile::where('mosque_id', $mosqueID)->get()->first();

        return response($response, 200);
    }

    function getVillages(Request $request)
    {
        $response = Village::where('mosque_id', request('mosque_id'))->get();

        return response($response, 200);
    }

    function getVillage(Request $request)
    {
        $villageID = request('villageID');

        $response = Village::where('id', $villageID)->get()->first();

        return response($response, 200);
    }

    function getMembers(Request $request)
    {
        $mosqueID = request('mosque_id');
        $offset = request('offset');
        $take = $offset + 50;

        $response = DB::table('people')
        ->where('people.mosque_id', $mosqueID)
        ->join('villages', 'people.village_id', '=', 'villages.id')
        ->select('people.*', 'villages.village_name',)
        ->skip($offset)->take($take)->get();

        return response($response, 200);
    }

    function addMembers(Request $request)
    {
        $response = Person::create([
            'person_member_no' => request('person_member_no'),
            'person_name' => request('person_name'),
            'person_ic' => request('person_ic'),
            'person_phone' => request('person_phone'),
            'person_occupation' => request('person_occupation'),
            'person_address' => request('person_address'),
            'mosque_id' => request('mosque_id'),
            'village_id' => request('village_id'),
            'person_expire_month' => request('person_expire_month'),
            'person_expire_year' => request('person_expire_year'),
            'person_status' => 'completed',
        ]);

        return response($response, 201);
    }

    function acceptMember(Request $request)
    {
        $mosqueID = request('mosque_id');
        $memberID = request('id');

        $response = Person::where('mosque_id', $mosqueID)->where('id', $memberID)->update([
            'person_status' => 'completed',
            'person_expire_month' => request('person_expire_month'),
            'person_expire_year' => request('person_expire_year'),
        ]);

        return response($response, 200);
    }

    function rejectMember(Request $request)
    {
        $mosqueID = request('mosque_id');
        $memberID = request('id');

        $response = Person::where('mosque_id', $mosqueID)->where('id', $memberID)->update([
            'person_status' => 'rejected',
        ]);

        return response($response, 200);
    }
}