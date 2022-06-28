@extends('admin.user_nav')

@section('content')
<div class="container">
    <div class="row m-auto">
        <h4>Pending Payment</h4>
        <div class="col-12 m-auto border border-3">
            @foreach($payments as $payment)
            @if($payment->is_done == 0) 
            <div class="row my-2">
                <div class="col-10">{{ $payment->mosque_name }}</div>
                <div class="col-2">
                    <form action="{{ route('admin.payment.view') }}" method="POST">
                        @csrf
                        <input type="text" name="paymentID" value="{{ $payment->id }}" hidden>
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                </div>
            </div>
            <hr class="solid">
            @endif
            @endforeach
        </div>
        <div class="my-3"></div>
        <h4>Completed Payment</h4>
        <div class="col-12 m-auto border border-3">
            @foreach($payments as $payment)
            @if($payment->is_done == 1) 
            <div class="row my-2">
                <div class="col-10">{{ $payment->mosque_name }}</div>
                <div class="col-2">
                    <form action="{{ route('admin.payment.only.view') }}" method="POST">
                        @csrf
                        <input type="text" name="paymentID" value="{{ $payment->id }}" hidden>
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                </div>
            </div>
            <hr class="solid">
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection