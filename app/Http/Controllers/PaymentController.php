<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DateTime;

class PaymentController extends Controller
{
    //get
    function getFromAdmin(Request $request) {
        $mosque = request('mosque_id');

        $response = DB::table('payments')
        ->where('payments.mosque_id', $mosque)
        ->join('people', 'payments.payer_id', '=', 'people.user_id')
        ->select('payments.*', 'people.person_expire_month', 'people.person_expire_year', 'people.person_name', 'people.person_expire_month')->get();
        
        return response($response, 200);
    }

    public function get(Request $request) {
        $userID = request('payer_id');

        $response = Payment::where('payer_id', $userID)->get();

        return response($response, 200);
    }

    //add
    function add(Request $request) {
        $payer = request('payer_id');
        $mosque = request('mosque_id');

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
            Storage::disk('ftp')->put('user_payment_prove/'.$payer.'/'.$filenametostore, fopen($request->file('image'), 'r+'));
      
            //Store $filenametostore in the database
            $payment = Payment::create([
                'payer_id' => $payer,
                'mosque_id' => $mosque,
                'prove_url' => request('prove_url'),
                'status' => 'pending',
                'prove_url' => '/images/user_payment_prove/'.$payer.'/'.$filenametostore,
            ]);


            return response($payment, 201);
        }

        return response([
            'message' => 'Error no image',
            402,
        ]);
    }

    //edit
    function action(Request $request) {
        $id = request('id');

        $response = Payment::where('id', $id)->update([
            'status' => request('status'),
        ]);

        return response($response, 200);
    }

    //delete
    function delete(Request $request) {
        $id = request('id');

        $response = Payment::where('id', $id)->delete();

        return response($response, 200);
    }
}