@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
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
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
        </form>

    <div class="row">
        <header class ="mb-3">Add Result {{$term}} </header>

        <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admission Number</th>
                                        <th>Student Name</th>
                                        <th>Add/Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($std as $key=> $s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->admission_no}}</td>
                                        <td>{{$s->full_name }}</td>
                                        <td>
                                            <a href="{{route('stdresult',[$term,$s->admission_no])}}" class="btn btn-primary btn-sm">Add/Edit</a>
                                        </td>
                                        {{-- <td>
                                            <a href="{{route('resultpdf',[$term,$s->admission_no,$dd->id])}}" class="btn btn-secondry btn-sm">Report</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
</div>


@endsection


