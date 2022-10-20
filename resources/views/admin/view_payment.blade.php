@extends('admin.user_nav')

@section('content')
<div class="container">
    <h3>Mosque Details</h3>
    <div class="border border-3 py-2 px-2">
        <div class="row">
            <div class="col-2"><strong>Mosque Name</strong></div>
            <div class="col-10">{{ $payment->mosque_name }}</div>
        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-2"><strong>Mosque Phone</strong></div>
            <div class="col-10">{{ $payment->mosque_phone }}</div>
        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-2"><strong>Mosque Status Expiry</strong></div>
            <div class="col-10">{{ $payment->mosque_expire_month.'/'.$payment->mosque_expire_year }}</div>
        </div>
    </div>
    <div class="my-4"></div>
    <h3>Payment Details</h3>
    <div class="border border-3 py-2 px-2">
        <div class="row">
            <div class="col-2"><strong>Remark</strong></div>
            <div class="col-10">{{ $payment->remark }}</div>
        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-2"><strong>Prove Image</strong></div>
            <div class="col-10"><img src="{{ 'https://khairatupm.000webhostapp.com/'.$payment->prove_url }}" alt="Prove" width="400px"></div>
        </div>
    </div>
    <div class="my-4"></div>
    <form action="{{ route('admin.payment.update') }}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $payment->id }}" name="paymentID">
        <input type="text" hidden value="{{ $payment->mosque_id }}" name="committeeID">
        <div class="border border-3 py-2 px-2">
            <div class="row">
                <div class="col-2"><strong>Month</strong></div>
                <div class="col-10">
                    <select class="form-select" name="month">
                        <option value="1" selected>January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                </div>
            </div>
            <hr class="solid">
            <div class="row">
                <div class="col-2"><strong>Year</strong></div>
                <div class="col-10">
                    <select class="form-select" name="year">
                        @for($i = date("Y")+5; $i >= date("Y"); $i--)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                      </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="my-3"></div>
            <button type="submit" class="btn btn-success">Accept</button>
        </div>
    </form>
    <form action="{{ route('admin.payment.reject') }}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $payment->id }}" name="paymentID">
        <div class="row">
            <div class="my-1"></div>
            <button type="submit" class="btn btn-danger">Reject</button>
            <div class="my-2"></div>
        </div>
    </form>
    <div class="my-3"></div>
</div>
@endsection