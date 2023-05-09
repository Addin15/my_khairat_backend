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
        </div>
        <div class="my-4"></div>
        <h3>Payment Details</h3>
        <div class="border border-3 py-2 px-2">
            <div class="row">
                <div class="col-2"><strong>Payment Status</strong></div>

                @if ($payment->is_rejected == 0)
                    <div class="col-10">Accepted</div>
                @else
                    <div class="col-10">Rejected</div>
                @endif

            </div>
            <hr class="solid">
            <div class="row">
                <div class="col-2"><strong>Remark</strong></div>
                <div class="col-10">{{ $payment->remark }}</div>
            </div>
            <hr class="solid">
            <div class="row">
                <div class="col-2"><strong>Prove Image</strong></div>
                <div class="col-10"><img src="{{ 'https://khairatupm.000webhostapp.com/' . $payment->prove_url }}"
                        alt="Prove" width="400px"></div>
            </div>
        </div>
        <div class="my-3"></div>
    </div>
@endsection
