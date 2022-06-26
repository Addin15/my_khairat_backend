<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\PaymentDetail;
use App\Models\CommitteeProfile;

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

    public function payment() {
        
        return view('admin.member_payment');
        
    }

    public function bank() {
        $payment = PaymentDetail::all()->first();
        return view('admin.bank_details', compact('payment'));
        
    }

    public function bankUpdate() {
        $bankName = request('bankName');
        $bankOwnerName = request('bankOwnerName');
        $bankAccountNo = request('bankAccountNo');
        $monthlyFee = request('monthlyFee');

        $result = PaymentDetail::where('id', 1)->update([
            'bank_name' => $bankName,
            'bank_owner_name' => $bankOwnerName,
            'bank_account_no' => $bankAccountNo,
            'monthly_fee' => $monthlyFee,
        ]);

        return redirect('admin/bank', [
            'success' => 'Successfully updated',
        ]);
        
    }

    function logout(Request $request)
    {
        if($request->session()->has('id')) {
            Session::pull('id');
            return redirect('admin/login');
        }
    }
}