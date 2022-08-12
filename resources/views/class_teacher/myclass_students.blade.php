
@extends('layouts.MasterDashboard')

@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row mt-3 mb-3">
        <h1 class="timetable cd-head text-center mb-2">My Class Students Records</h1>
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
                            Num of Students
                            <p class="text-end" >{{$std->count()}}</p>
                        </p>
                      </div>
                    </div>

            </div>

        </div>
    </div>

    </div>
    <div class="row">
        <h2 class="card-text">Students Details :-</h2>
    </div>
    <div class="row">
        <div class="text-end">
            <div class="row">

            <form action="?" class="col-sm-2 me-auto" >
                <div class="input-group">
                    <button type="submit" class="btn btn-primary"> Go!</button>
                    <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
                 </div>
            </form>
            <div class="col-3">
                <a href="#"><button type="button">Excel</button></a>
                <a href="#"><button type="button">PDF</button></a>
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
                <th scope="col">Date of Birth</th>
                <th scope="col">Guardian Name</th>
                <th scope="col">Guardian Email</th>
                <th scope="col">Guardian Contact Number</th>
                <th scope="col">More Performance Details</th>

            </tr>
        </thead>
            <tbody>

          @foreach($std as $key=> $s)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$s->admission_no}}</td>
            <td>{{$s->full_name}}</td>
            <td>{{$s->dob}}</td>
            <td>{{$s->guardian_name}}</td>
            <td>{{$s->guardian_email}}</td>
            <td>{{$s->guardian_contact_no}}</td>
            <td><a href="{{route('myclass.studentview',[$s->admission_no])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
        </tr>
        {{-- {{route('ass.quizshow',[$ass->id])}} --}}
        @endforeach


            </tbody>
    </table>
    <div class="pagination justify-content-end mt-3">
        {!! $std->links() !!}
        </div>
    </div>
    </div>

@endsection
