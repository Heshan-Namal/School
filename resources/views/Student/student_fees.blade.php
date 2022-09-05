@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <header> Facility Fees</header>
    @if ($stdsub->count()>0)
    <h2> You Already Pay your Fees</h2>
    @else

    <div class="row">
        <form action="{{route('store.std.fee')}}" method="POST" class="row g-3" enctype="multipart/form-data">@csrf
            <h3>
                You have to pay {{$std->amount}} in this year
            </h3>
            <h5>
                {{$std->note}}
            </h5>
            <div class="col">
                <label>Uploaded Image of Payment Slip</label>
                <input type="file" class="form-control" name="proof" required>
            </div>
            <input type="hidden" class="form-control" name="id" value="{{$std->id}}">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary">Pay By Online</button>
            </div>
        </form>
    </div>

    @endif

</div>


@endsection