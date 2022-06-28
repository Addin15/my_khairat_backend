@extends('admin.user_nav')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="d-flex align-items-stretch flex-xl-column justify-content-md-center align-items-center vh-100">
            <div class="alert alert-primary" role="alert">
                Pending registration
            </div>
            @foreach ($committees as $committee)
                @if ($committee->mosque_status != 'pending')
                    @continue
                @endif

                <form action="{{ route('admin.committee.new.view') }}" method="POST">
                    <div class="row">
                        <p class="col-10">{{ $committee->mosque_name }}</p>
                        <input type="text" name="id" value="{{ $committee->mosque_id }}" hidden/>
                        @csrf
                        <button type="submit" class="btn btn-secondary col-2" >View</button>
                        
                    </div>
                </form>
                
            @endforeach
            <div class="my-3"></div>
            <div class="alert alert-info" role="alert">
                Members List
            </div>
            @foreach ($committees as $committee)
                @if ($committee->mosque_status == 'pending')
                    @continue
                @endif
        
                <form action="{{ route('admin.committee.view') }}" method="POST">
                    <div class="row">
                        <p class="col-10">{{ $committee->mosque_name }}</p>
                        <input type="text" name="committeeID" value="{{ $committee->mosque_id }}" hidden/>
                        @csrf
                        <button type="submit" class="btn btn-secondary col-2" >View</button>
                        
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection