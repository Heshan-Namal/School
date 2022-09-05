@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="content">
    <div class="container_AssStudent">
        <h2 class="timetable text-center">TERM TEST ACTIVITIES</h2>
    </div>
    <div class="container_AssStudent test">
        <header> Add Term Test Marks</header>
        <div class="row ">
            <form action="{{route('addresult',[$dd->id])}}" method="GET" class="row g-3">@csrf
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Class</label>
                    <input type="text" disabled class="form-control" value="{{$dd->class_name}}">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Term</label>
                    <select id="inputClass" name="term" class="form-select mt-0" aria-label="Default select example">
                        <option selected>Choose...</option>
                        <option value="term1">First Term</option>
                        <option value="term2">Second Term</option>
                        <option value="term3">Third Term</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection