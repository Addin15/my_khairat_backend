@extends('admin.user_nav')

@section('content')
<div class="container ">
    <div class="row m-auto">
        <h4>Pending Registration</h4>
        <div class="col-12 m-auto border border-3 p-3">
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
        </div>
        <div class="my-3"></div>
        <h4>Registered User</h4>
        <div class="col-12 m-auto border border-3 p-3">
            @foreach ($committees as $committee)
            @if ($committee->mosque_status == 'pending' || $committee->mosque_status == 'rejected')
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