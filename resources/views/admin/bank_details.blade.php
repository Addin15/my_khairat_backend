@extends('admin.user_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="d-flex justify-content-md-center align-items-center vh-100">
                <form action="{{ route('admin.bank.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <label for="bankName">Bank Name</label><br>
                        <input type="text" value="{{ $payment->bank_name }}" name="bankName"/>
                        <div class="mb-3"></div>
                        <label for="bankOwnerName">Bank Owner Name</label><br>
                        <input type="text" value="{{ $payment->bank_owner_name }}" name="bankOwnerName"/>
                        <div class="mb-3"></div>
                        <label for="bankAccountNo">Bank Account No</label><br>
                        <input type="text" value="{{ $payment->bank_account_no }}" name="bankAccountNo"/>
                        <div class="mb-3"></div>
                        <label for="monthlyFee">Monthly Fee</label><br>
                        <input type="text" value="{{ $payment->monthly_fee }}" name="monthlyFee"/>
                        <div class="mb-3"></div>
                        <button type="submit" class="btn btn-success mt-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection