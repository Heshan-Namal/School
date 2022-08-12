@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
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


    <header>Student Details:-</header>

<div class="row d-flex justify-content-end mt-3">
        <form action="?" class="col-sm-4 me-auto" >
        <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
        </form>
        <div class="col-2">
            <a href="{{route('std.export',[$classid,$subjectid])}}"><button type="button">Excel</button></a>
            <a href="{{route('std.exportpdf',[$classid,$subjectid])}}"><button type="button">PDF</button></a>
        </div>
</div>

    <div class="row">
    <table class="table table-success table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Admission Number</th>
                <th>Student Name</th>
                <th>Guardian Email</th>
                <th><span data-bs-toggle="tooltip" title="red(<40)">Submited Assesment Precentage</span></th>
                <th><span data-bs-toggle="tooltip" title="red(<40)">Assesment Marks Average</span></th>
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
