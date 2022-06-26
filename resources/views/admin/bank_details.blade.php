@extends('admin.user_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            @if(isset($success))
                <div class="alert alert-success" role="alert">
                    {{ $success }}
                  </div> 
                @endif 
            <div class="d-flex justify-content-md-center align-items-center vh-100">
                              
                <form action="{{ route('admin.bank.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <label for="bankName">Bank Name</label><br>
                        <input type="text" value="@isset($payment){{ $payment->bank_name }}@endisset($payment)" name="bankName"/>
                        <span class="text-danger">@error('bankName'){{ $message }}@enderror</span>
                        <div class="mb-3"></div>
                        <label for="bankOwnerName">Bank Owner Name</label><br>
                        <input type="text" value="@isset($payment){{ $payment->bank_owner_name}} @endisset($payment)" name="bankOwnerName"/>
                        <span class="text-danger">@error('bankOwnerName'){{ $message }}@enderror</span>
                        <div class="mb-3"></div>
                        <label for="bankAccountNo">Bank Account No</label><br>
                        <input type="text" value="@isset($payment){{ $payment->bank_account_no }} @endisset($payment)" name="bankAccountNo"/>
                        <span class="text-danger">@error('bankAccountNo'){{ $message }}@enderror</span>
                        <div class="mb-3"></div>
                        <label for="monthlyFee">Monthly Fee</label><br>
                        <input type="text" value="@isset($payment){{ $payment->monthly_fee }}@endisset($payment)" name="monthlyFee"/>
                        <span class="text-danger">@error('monthlyFee'){{ $message }}@enderror</span>
                        <div class="mb-3"></div>
                        <button type="submit" class="btn btn-success mt-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection