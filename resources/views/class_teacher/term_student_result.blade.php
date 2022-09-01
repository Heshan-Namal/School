@extends('layouts.MasterDashboard')
@section('content')
        <div class="container_AssStudent d-flex justify-content-center">
            <div class="mt-5">
            <div class="row g-3 ">
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Year</label>
                    <input type="text" disabled class="form-control" value="{{$lables->year}}">
                </div>
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Term</label>
                    <input type="text" disabled class="form-control" value="{{$lables->term}}">
                </div>
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Admission No:</label>
                    <input type="text" disabled class="form-control" value="{{$lables->admission_no}}">
                </div>
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Class:</label>
                    <input type="text" disabled class="form-control" value="{{$lables->class_name}}">
                </div>
                </form>
            </div>
            <div class="row g-3">
                <div class="col-6">
                    <label for="inputEmail4" class="form-label">Student Name:</label>
                    <input type="text" disabled class="form-control" value="{{$lables->full_name}}">
                </div>
                <div class="col-3">
                    <label for="inputEmail4" class="form-label">Average:</label>
                    <input type="text" disabled class="form-control" value="{{$avg}}">
                </div>
                <div class="col-3">
                    <label for="inputEmail4" class="form-label">Place:</label>
                    <input type="text" disabled class="form-control" value="{{$pos}}">
                </div>
                </form>
            </div>
            @foreach ($data as $key=> $dt)
            <div class="row g-3 mt-3">
                <div class="col-md-4 text-center">
                    <label for="inputEmail4" class="form-label">{{$dt->subject_name}}:</label>
                </div>

                <div class="col-md-4">
                    <input type="text" disabled class="form-control" value="{{$dt->marks}}">
                </div>
            </div>
            @endforeach
            <div class="row mt-5">
                <h4 class="timetable mb-2">Absent subjects {{$count-$data->count()}}</h4>
                <h4 class="timetable mb-2">Cetified By</h4>
            </div>
            <div class="text-end">
                <a href="{{route('resultpdf',[$lables->term,$lables->admission_no,$lables->class_id])}}" class="btn btn-primary btn-sm">Generate Report</a>
            </div>
            </div>
            

        </div>
@endsection
