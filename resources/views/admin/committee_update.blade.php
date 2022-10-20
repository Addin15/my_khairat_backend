@extends('admin.user_nav')

@section('content')
<div class="container">
    @if(isset($message))
    <div class="alert alert-success my-2" role="alert">
        {{ $message }}
    </div>
    @endif
    <h3>Mosque Details</h3>
    <div class="border border-3 py-2 px-2">
        <div class="row">
            <div class="col-2"><strong>Mosque Name</strong></div>
            <div class="col-10">{{ $committee->mosque_name }}</div>
        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-2"><strong>Mosque Phone</strong></div>
            <div class="col-10">{{ $committee->mosque_phone }}</div>
        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-2"><strong>Mosque Status Expiry</strong></div>
            <div class="col-10">{{ $committee->mosque_expire_month.'/'.$committee->mosque_expire_year }}</div>
        </div>
    </div>
    <div class="my-4"></div>
    <form action="{{ route('admin.committee.update') }}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $committee->mosque_id }}" name="id">
        <div class="border border-3 py-2 px-2">
            <div class="row">
                <div class="col-2"><strong>Month</strong></div>
                <div class="col-10">
                    <select class="form-select" name="month">
                        <option value="1" @if($committee->mosque_expire_month == 1) selected @endif>January</option>
                        <option value="2" @if($committee->mosque_expire_month == 2) selected @endif>February</option>
                        <option value="3" @if($committee->mosque_expire_month == 3) selected @endif>March</option>
                        <option value="4" @if($committee->mosque_expire_month == 4) selected @endif>April</option>
                        <option value="5" @if($committee->mosque_expire_month == 5) selected @endif>May</option>
                        <option value="6" @if($committee->mosque_expire_month == 6) selected @endif>June</option>
                        <option value="7" @if($committee->mosque_expire_month == 7) selected @endif>July</option>
                        <option value="8" @if($committee->mosque_expire_month == 8) selected @endif>August</option>
                        <option value="9" @if($committee->mosque_expire_month == 9) selected @endif>September</option>
                        <option value="10" @if($committee->mosque_expire_month == 10) selected @endif>October</option>
                        <option value="11" @if($committee->mosque_expire_month == 11) selected @endif>November</option>
                        <option value="12" @if($committee->mosque_expire_month == 12) selected @endif>December</option>
                      </select>
                </div>
            </div>
            <hr class="solid">
            <div class="row">
                <div class="col-2"><strong>Year</strong></div>
                <div class="col-10">
                    <select class="form-select" name="year">
                        @for($i = date("Y")+5; $i >= date("Y"); $i--)
                        <option value="{{ $i }}" @if($committee->mosque_expire_year == $i) selected @endif>{{ $i }}</option>
                        @endfor
                      </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="my-3"></div>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    <div class="my-3"></div>
</div>
@endsection