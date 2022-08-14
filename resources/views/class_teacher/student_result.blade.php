@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="content">
    <div class="row mb-3">
        <h1 class="timetable cd-head text-center mb-2">Term Test Marks</h1>
    </div>
<div class="container_AssStudent">
    <div class="row g-3">
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Year</label>
            <input type="text" disabled class="form-control" value="{{$year}}">
        </div>
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Term</label>
            <input type="text" disabled class="form-control" value="{{$term}}">
        </div>
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Admission No:</label>
            <input type="text" disabled class="form-control" value="{{$std->admission_no}}">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-6">
            <label for="inputEmail4" class="form-label">Student Name:</label>
            <input type="text" disabled class="form-control" value="{{$std->full_name}}">
        </div>
        <div class="col-3">
            <label for="inputEmail4" class="form-label">Average:</label>
            <input type="text" disabled class="form-control">
        </div>
        <div class="col-3">
            <label for="inputEmail4" class="form-label">Place:</label>
            <input type="text" disabled class="form-control">
        </div>
        </form>
    </div>
    @foreach ($data as $key=> $dt)
    <div class="row g-3 mt-3">
        <div class="col-md-4 text-center">
            <label for="inputEmail4" class="form-label">{{$dt->subject_name}}:</label>
        </div>

        <div class="col-md-4">
            @if ($sub[$dt->subjectid]=='no')
            <input type="submit" value="Enter Marks" id="enter{{$dt->subjectid}}" class="btn btn-warning btn-sm " onclick="entermarks({{$dt->subjectid}});">

            <form action="{{route('enter.testmarks',[$term,$dt->subjectid,$dt->classid])}}" method="POST" > @csrf

                <input type="text" hidden name="marks" class="col-sm-2" id="marks{{$dt->subjectid}}">
                <input type="text" hidden name="studentid" class="col-sm-2" value="{{$std->admission_no}}">
                <button type="submit" hidden name="save" class="btn btn-primary btn-sm" id="save{{$dt->subjectid}}" ><i class="bi bi-check2-circle"></i></button>

            </form>

        @else
            <form action="{{route('update.testmarks',[$term,$dt->subjectid,$dt->classid])}}" method="POST" > @method('PUT') @csrf
                    <input type="text" disabled name="marks" value="{{$sub[$dt->subjectid]}}" class="col-sm-2" id="marks{{$dt->subjectid}}">
                    <input type="text" hidden name="studentid" class="col-sm-2" value="{{$std->admission_no}}">
                    <button type="submit" hidden name="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$dt->subjectid}}" ><i class="bi bi-check2-circle"></i></button>
            </form>
            <button type="submit" name="edit" class="btn btn-success btn-sm " onclick="editmarks({{$dt->subjectid}});" id="edit{{$dt->subjectid}}"><i class="bi bi-pencil-square "></i></button>
        @endif
        </div>
        </form>
    </div>
    @endforeach

</div>
    </div>
<script src="{{asset('assets/front/js/termtest.js')}}"></script>
@endsection
