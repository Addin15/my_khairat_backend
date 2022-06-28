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
                        <div class="col-2"><strong>Mosque Account Expiry</strong></div>
                        <div class="col-10">{{ $committee->mosque_expire_month.'/'.$committee->mosque_expire_year }}</div>
                    </div>

                    <div class="my-3"></div>
                    <div class="my-3"></div>

                    <form action="{{ route('admin.committee.edit') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $committee->mosque_id }}" name="id" hidden>
                        <div class="row">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                    
                    
                    <div class="my-3"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection