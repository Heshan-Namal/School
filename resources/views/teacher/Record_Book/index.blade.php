@extends('layouts.MasterDashboard')

@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">


    <h1 class="timetable colo text-center mb-5">Record Book</h1>
    <div class="row">
        <h2 class="card-text">WEEK {{$week}}  & Today is {{$day}}</h2>
    </div>

    <div class="row">
        @if($record->count()>0)
            @foreach($record as $key=>$r)
            <div class="col-sm-3">
                <div class="card">
                    <form action="{{route('record.store',[$classid,$subjectid])}}" method="POST">@csrf
                    <h4 class="card-header form-control cd-head card-text">{{$r->period}}</h4>
                  <div class="card-body table">
                    <div class="form-group mb-4 ">
                        <label for="name">Enter Record</label>
                        @if(isset($book[$r->period]))
                            <textarea class="form-control mb-4" disabled id="rec" name="record">{{$book[$r->period]}}</textarea>
                         @else
                         <textarea class="form-control mb-4" name="record"></textarea>
                         @error('record')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                          @endif
                    </div>
                   <input type="hidden" class="form-control" name="term" value="{{$term}}">
                   <input type="hidden" class="form-control" name="period" value="{{$r->period}}">
                   @if(isset($book[$r->period]))
                   <div class="text-end">
                        <button class="btn btn-success btn-sm " data-bs-toggle="modal"  data-bs-target="#editrecModal" data-bs-period="{{$r->period}}" data-bs-record="{{$book[$r->period]}}" type="button">Edit</button>
                        <button class="btn btn-sm btn-warning" type="reset">Cancel</button>
                    </div>
                    @else
                    <div class="text-end">
                        <button class="btn btn-sm btn-primary" type="submit">Add</button>
                        <button class="btn btn-sm btn-warning" type="reset">Cancel</button>
                    </div>
                    @endif
                  </div>
                </form>
                </div>
              </div>
              @endforeach
              @else
              <h4 class="table">You Dont have any Periods Today</h4>
            @endif
    </div>

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
        <div class="input-group-prepend mx-4 mb-5">
        <button class="btn btn-md btn-primary mx-4 " onclick="changeterm('term1')" >First Term</button>
        <button class="btn btn-md btn-primary mx-4" onclick="changeterm('term2')">Second Term</button>
        <button class="btn btn-md btn-primary mx-4" onclick="changeterm('term3')" >Third Term</button>
        </div>
        </div>
    </div>
    <div class="row" id="term1">
        <h2 class="head">First Term Record Book</h2>

        @if($term1->count()>0)

        <div class="text-end">
            <div class="row">
                <div class="text-end mb-3">
                   <input type="text"  name="search" placeholder="Search" id="search">
                   <a href="{{route('rec.export',[$classid,$subjectid,'term2'])}}"><button type="button">Excel</button></a>
                   <a href="{{route('rec.exportpdf',[$classid,$subjectid,'term2'])}}"><button type="button">PDF</button></a>
               </div>
               </div>
        </div>
        <table class="table table-success table-hover m-0">

            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Period</th>
              <th scope="col">Record</th>
              <th scope="col">Submited Date and Time</th>

            </tr>
            </thead>
            <tbody id="myTable">
              @foreach($term1 as $key=> $t1)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$t1->day}}</td>
              <td>{{$t1->period}}</td>
              <td>{{$t1->record}}</td>
              <td>{{$t1->updated_at}}</td>
            </tr>

            @endforeach
            </tbody>
            @else
            <div class="table-card">
            <div class="card-header">No Records assign yet</div>
            <div class="card-body">
            <img src="{{asset('assets/front/images/notfound.jpg')}}" alt="...">
            </div>
            </div>

            @endif
        </table>
    </div>
    <div class="row" id="term2" hidden>
        <h2 class="head">Second Term Record Book</h2>
        @if($term2->count()>0)
            <div class="row">
             <div class="text-end mb-3">
                <input type="text"  name="search" placeholder="Search" id="search">
                <a href="{{route('rec.export',[$classid,$subjectid,'term2'])}}"><button type="button">Excel</button></a>
                <a href="{{route('rec.exportpdf',[$classid,$subjectid,'term2'])}}"><button type="button">PDF</button></a>
            </div>
            </div>

        <table class="table table-success table-hover m-0">

            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Period</th>
              <th scope="col">Record</th>
              <th scope="col">Submited Date and Time</th>

            </tr>
            </thead>
            <tbody id="myTable">
              @foreach($term2 as $key=> $t1)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$t1->day}}</td>
              <td>{{$t1->period}}</td>
              <td>{{$t1->record}}</td>
              <td>{{$t1->updated_at}}</td>
            </tr>

            @endforeach
            </tbody>
            @else
            <div class="table-card">
            <div class="card-header">No Records assign yet</div>
            <div class="card-body">
            <img src="{{asset('assets/front/images/notfound.jpg')}}" alt="...">
            </div>
            </div>

            @endif
        </table>

    </div>
    <div class="row" id="term3" hidden>
        <h2 class="head">Third Term Record Book</h2>
        @if($term3->count()>0)

        <div class="text-end">
            <div class="row">
                <div class="text-end mb-3">
                   <input type="text"  name="search" placeholder="Search" id="search">
                   <a href="{{route('rec.export',[$classid,$subjectid,'term2'])}}"><button type="button">Excel</button></a>
                   <a href="{{route('rec.exportpdf',[$classid,$subjectid,'term2'])}}"><button type="button">PDF</button></a>
               </div>
               </div>
        </div>


        <table class="table table-success table-hover m-0">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Period</th>
              <th scope="col">Record</th>
              <th scope="col">Submited Date and Time</th>

            </tr>
            </thead>
            <tbody id="myTable">
              @foreach($term3 as $key=> $t1)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$t1->day}}</td>
              <td>{{$t1->period}}</td>
              <td>{{$t1->record}}</td>
              <td>{{$t1->updated_at}}</td>
            </tr>

            @endforeach
            </tbody>
            @else
            <div class="table-card">
            <div class="card-header">No Records assign yet</div>
            <div class="card-body">
            <img src="{{asset('assets/front/images/notfound.jpg')}}" alt="...">
            </div>
            </div>

            @endif
        </table>
    </div>

</div>


<div class="modal fade" id="editrecModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit Record Book Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.recedit')
        </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/front/js/rec.js')}}"></script>
@endsection





