@extends('admin.user_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-md-center align-items-center">
                <div class="row">
                    <div class="row w-100">
                        <div class="col-2"><strong>Mosque Name</strong></div>
                        <div class="col-10">{{ $committee->mosque_name }}</div>
                    </div>
                    <div class="my-3"></div>
                    <div class="row w-100">
                        <div class="col-2"><strong>Mosque Phone</strong></div>
                        <div class="col-10">{{ $committee->mosque_phone }}</div>
                    </div>
                    <div class="my-3"></div>
                    <div class="row w-100">
                        <div class="col-2"><strong>Mosque Postcode</strong></div>
                        <div class="col-10">{{ $committee->mosque_postcode }}</div>
                    </div>
                    <div class="my-3"></div>
                    <div class="row w-100">
                        <div class="col-2"><strong>Mosque State</strong></div>
                        <div class="col-10">{{ $committee->mosque_state }}</div>
                    </div>
                    <div class="my-3"></div>
                    <div class="row w-100">
                        <div class="col-2"><strong>Mosque Address</strong></div>
                        <div class="col-10">{{ $committee->mosque_address }}</div>
                    </div>
                    <div class="my-3"></div>
                    <div class="row w-100">
                        <div class="col-2"><strong>Registration Payment Prove</strong></div>
                        <div class="col-10"><img src="{{ 'https://khairatupm.000webhostapp.com/'.$committee->mosque_registration_prove }}" alt="Prove" width="400px"></div>
                    </div>

                    <div class="my-3"></div>
                    <div class="my-3"></div>

                    <form action="{{ route('admin.committee.accept') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $committee->mosque_id }}" name="id" hidden>
                        <div class="row">
                            <button type="submit" class="btn btn-success">Accept</button>
                        </div>
                    </form>
                    
                    <div class="my-1"></div>
                    <form action="{{ route('admin.committee.reject') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $committee->mosque_id }}" name="id" hidden>
                    <div class="row">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </div>
                    </form>
                    <div class="my-3"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection