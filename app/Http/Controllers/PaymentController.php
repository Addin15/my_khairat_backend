<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //get
    function get(Request $request) {
        $mosque = request('mosque_id');

        $response = Payment::where('mosque_id', $mosque)->get();

        return response($response, 200);
    }

    //add
    function add(Request $request) {
        $mosque = request('mosque_id');
        $payer = request('payer_id');

        $response = Payment::create([
            'mosque_id' => $mosque,
            'payer_id' => $payer,
            'payment_date' => request('payment_date'),
            'start_month' => request(start_month),
            'start_year' => request('start_year'),
            'end_month' => request('end_month'),
            'end_year' => request('end_year'),
            'amount' => request('amount'),
            'prove_url' => request('prove_url'),
            'status' => request('status'),
        ]);

        return response($response, 201);
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