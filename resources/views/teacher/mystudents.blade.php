@foreach($detail as $key=> $d)
@extends('layouts.MasterDashboard')
@endforeach
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row mt-3 mb-3">
        <h1 class="timetable cd-head text-center mb-2">Student Records</h1>
    </div>
    <div class="row  d-flex justify-content-end ">
        <div class="col-4">
            <div class="box-card">
                <div class="row g-0">
                    <div class="col-md-4 ">
                      <img
                        src="{{asset('assets/front/images/ass/s.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-2"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                            No. of Students
                            <p class="text-end" >{{$std->count()}}</p>
                        </p>
                      </div>
                    </div>

            </div>

        </div>
    </div>

    </div>
    <div class="row">
        <h2 class="card-text">Student Details:-</h2>
    </div>
    <div class="row">
        <div class="text-end">
            <div class="row">

            <form action="?" class="col-sm-2 me-auto" >
                <div class="input-group">
                    <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
                    <button type="submit" class="btn btn-primary"> Go!</button>
                </div>
            </form>
            <div class="col-3">
                <a href="{{route('std.export',[$classid,$subjectid])}}"><button type="button">Excel</button></a>
                <a href="{{route('std.exportpdf',[$classid,$subjectid])}}"><button type="button">PDF</button></a>
            </div>
            </div>

            {{-- <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit" value="Create Assesment"> --}}
        </div>

    <table class="table table-success table-hover mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Admission Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Guardian Email</th>
                <th scope="col">Submited Assesment Precentage(red<40)</th>
                <th scope="col">Assesment Marks Average(red<40)</th>
            </tr>
        </thead>
            <tbody>

          @foreach($std as $key=> $s)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$s->admission_no}}</td>
            <td>{{$s->full_name}}</td>
            <td>{{$s->guardian_email}}</td>
            @if ($sub[$s->admission_no] <40)
            <td><span style="color:#FF0000">{{$sub[$s->admission_no]}}%</td>
            @else
            <td>{{$sub[$s->admission_no]}}%</td>
            @endif
            @if ($mark[$s->admission_no] <40.0)
            <td><span style="color:#FF0000">{{$mark[$s->admission_no]}}</td>
            @else
            <td>{{$mark[$s->admission_no]}}</td>
            @endif

        </tr>

        @endforeach


            </tbody>
    </table>
    <div class="pagination justify-content-end mt-3">
        {!! $std->links() !!}
        </div>
    </div>
</div>
@endsection
