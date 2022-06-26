@extends('admin.user_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-md-center align-items-center vh-100">
                <div class="row w-100">
                    <div class="col-2"><strong>Mosque Name</strong></div>
                    <div class="col-10">{{ $committee->mosque_name }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection