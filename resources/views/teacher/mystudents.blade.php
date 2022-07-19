@foreach($detail as $key=> $d)
@extends('layouts.MasterDashboard')
@endforeach
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row  d-flex justify-content-end ">
        <div class="col-4">
            <div class="box-card">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                      <img
                        src="{{asset('assets/front/images/ass/s.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-2"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                            Num of Students
                            <p class="text-end" >{{$std->count()}}</p>
                        </p>
                      </div>
                    </div>

            </div>

        </div>

    </div>
    <div class="row mt-2">
        <div class="head">
            <p><u>Class Students Details :-</u> :-</p>
        </div>
    </div>
    <div class="row mt-4">

    <table class="table table-success table-hover mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Admission Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Guardian Email</th>
                <th scope="col">Submited Assesment Precentage</th>
                <th scope="col">Assesment Marks Average</th>
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
            @if ($mark[$s->admission_no] <15.0)
            <td><span style="color:#FF0000">{{$mark[$s->admission_no]}}</td>
            @else
            <td>{{$mark[$s->admission_no]}}</td>
            @endif

        </tr>

        @endforeach


            </tbody>
    </table>
    </div>
</div>
@endsection
