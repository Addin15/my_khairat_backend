<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\PaymentDetail;
use App\Models\CommitteeProfile;
use App\Models\CommitteePayment;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $user = Admin::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return view('admin.login', [
                'error' => 'Wrong credentials',
            ]);
        }

        $request->session()->put('id', $user->id);

        return redirect('admin');
    }

    public function dashboard() {
        $committees = CommitteeProfile::all();

        return view('admin.dashboard', compact('committees'));
        
    }

    public function newCommittee(Request $request) {
        $committeeID = request('id');

        $committee = CommitteeProfile::where('mosque_id', $committeeID)->where('mosque_status', 'pending')->get()->first();

        if($committee) {
            return view('admin.new', compact('committee'));
        } else {
            return redirect('admin');
        }
    }

    public function viewCommittee(Request $request) {
        $id = request('committeeID');

        $committee = CommitteeProfile::where('mosque_id', $id)->get()->first();

        return view('admin.view_committee', compact('committee'));
    }

    public function payment() {

        $payments = DB::table('committee_payments')
        ->join('committee_profiles', 'committee_payments.committee_id', '=', 'committee_profiles.mosque_id')
        ->select('committee_profiles.*', 'committee_payments.*')->get();
        
        return view('admin.member_payment', compact('payments'));
        
    }

    public function viewPayment(Request $request) {
        $id = request('paymentID');

        $payment = DB::table('committee_payments')
        ->where('committee_payments.id', $id)
        ->join('committee_profiles', 'committee_payments.committee_id', '=', 'committee_profiles.mosque_id')
        ->select('committee_profiles.*', 'committee_payments.*')
        ->get()->first();

        return view('admin.view_payment', compact('payment'));
    }

    public function onlyViewPayment(Request $request) {
        $id = request('paymentID');

        $payment = DB::table('committee_payments')
        ->where('committee_payments.id', $id)
        ->join('committee_profiles', 'committee_payments.committee_id', '=', 'committee_profiles.mosque_id')
        ->select('committee_profiles.*', 'committee_payments.*')
        ->get()->first();

        return view('admin.view_only_payment', compact('payment'));
    }

    public function updatePayment(Request $request) {

        $request->validate([
            'paymentID' => 'required',
            'committeeID' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $id = request('paymentID');
        $committeeID = request('committeeID');
        $month = request('month');
        $year = request('year');

        CommitteeProfile::where('mosque_id',$committeeID)->update([
            'mosque_expire_month' => request('month'),
            'mosque_expire_year' => request('year'),
        ]);

        $response = CommitteePayment::where('id', $id)->update([
            'is_done' => 1,
        ]);

        return redirect('admin/payment');

    }

    public function rejectPayment(Request $request) {

        $request->validate([
            'paymentID' => 'required',
        ]);

        $id = request('paymentID');
        $month = request('month');
        $year = request('year');

        $response = CommitteePayment::where('id', $id)->update([
            'is_done' => 1,
            'is_rejected' => 1,
        ]);

        return redirect('admin/payment');

    }

    public function bank() {
        $payment = PaymentDetail::all()->first();
        return view('admin.bank_details', compact('payment'));
        
    }

    public function bankUpdate(Request $request) {
        $request->validate([
            'bankName' => 'required|string',
            'bankOwnerName' => 'required|string',
            'bankAccountNo' => 'required|string',
            'monthlyFee' => 'required',
        ]);


        $bankName = request('bankName');
        $bankOwnerName = request('bankOwnerName');
        $bankAccountNo = request('bankAccountNo');
        $monthlyFee = request('monthlyFee');

        $existing = PaymentDetail::all()->first();

        if($existing) {
            $updated = PaymentDetail::where('id', $existing->id)->update([
                'bank_name' => $bankName,
                'bank_owner_name' => $bankOwnerName,
                'bank_account_no' => $bankAccountNo,
                'monthly_fee' => $monthlyFee,
            ]);

            if($updated) {
                $payment = PaymentDetail::all()->first();
            }

        } else {
            $inserted = PaymentDetail::create([
                'bank_name' => $bankName,
                'bank_owner_name' => $bankOwnerName,
                'bank_account_no' => $bankAccountNo,
                'monthly_fee' => (double)$monthlyFee,
            ]);

            if($inserted) {
                $payment = PaymentDetail::all()->first();
            }
        }
        

        return view('admin.bank_details', [
            'success' => 'successfully updated',
            'payment' => $payment,
        ]);
        
    }

    public function acceptCommittee(Request $request) {
        $id = request('id');

        CommitteeProfile::where('mosque_id', $id)->update([
            'mosque_status' => 'completed',
        ]);

        return redirect('admin');
    }

    public function rejectCommittee() {
        $id = request('id');

        CommitteeProfile::where('mosque_id', $id)->update([
            'mosque_status' => 'rejected',
        ]);

        return redirect('admin');
    }



    function logout(Request $request)
    {
        if($request->session()->has('id')) {
            Session::pull('id');
            return redirect('admin/login');
        }
    }
}