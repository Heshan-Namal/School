@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')

<div class="container_AssStudent">
    <div class="row col-12">
        <div class="col-3">
        <div class="sub-card">
            <div class="row g-0">
                <div class="col-md-4 mt-3">
                  <img
                    src="{{asset('assets/front/images/ass/subass2.png')}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start d-flex mx-2"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text">
                        Submissions
                        <p>{{$nums}}</p>

                    </p>
                  </div>
                </div>
              </div>

        </div>
        </div>
        <div class="col-3">
            <div class="sub-card">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                      <img
                        src="{{asset('assets/front/images/ass/subass1.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-2"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                            Late Submissions
                            <p>{{$late}}</p>

                        </p>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/no_pub.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                               Unmarked Submissions
                                <p>{{$mar}}</p>

                            </p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>
                <div class="col-3">
                    <div class="sub-card">
                        <div class="row g-0">
                            <div class="col-md-4 mt-3">
                              <img
                                src="{{asset('assets/front/images/ass/ass.png')}}"
                                alt="Trendy Pants and Shoes"
                                class="img-fluid rounded-start d-flex"
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <p class="card-text">
                                    Number of Students who didn't submit
                                   <span class="value rounded-circle ms-5">
                                    {{$notsub}}
                                </span>
                                </p>
                              </div>
                            </div>
                          </div>

                    </div>
                    </div>
    </div>

    <div class="row mt-4">
        <div class="col-8">
        <header>Submission {{$title->title}} Details</header>
        <form action="?" >
        <div class="d-flex justify-content-end">
            <div class="col-4 mb-3">
                <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
            </div>
        </div>
        </form>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
<div class="row">
    <div class="col-8">
@if($sub->count()>0)
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Submisson File</th>
            <th>Due Date</th>
            <th>Uploaded date</th>
            <th><span data-bs-toggle="tooltip" title="red(<50)">Marks</span></th>
        </tr>
    </thead>
    <tbody>
        @foreach($sub as $key=> $s)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$s->name}}</td>
              @if($s->type == 'upload_file')
                <td><a class="Link" href="http://127.0.0.1:8000/assignments/{{$s->file}}">{{$s->file}}</a></td>
                @else
                <td>No File - MCQ </td>
              @endif
              <td>{{$s->due_date}}</td>
              <td>{{$s->date}}</td>
              @if(($s->marks != null) && ($s->type != 'mcq_quiz'))
                <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
                <td><input type="text" disabled name="marks" value="{{$s->marks}}" class="col-sm-2" id="marks{{$s->id}}">
                <button type="submit" hidden name="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" ><i class="bi bi-check2-circle"></i></button>
                </form>
                <button type="submit" name="edit" class="btn btn-success btn-sm " onclick="editmarks({{$s->id}});" id="edit{{$s->id}}"><i class="bi bi-pencil-square "></i></button></td>

              @elseif (($s->marks == null) && ($s->type != 'mcq_quiz'))
              <td><input type="submit" value="Enter Marks" id="enter{{$s->id}}" class="btn btn-warning btn-sm " onclick="entermarks({{$s->id}});">
              <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
              <input type="text" hidden name="marks" class="col-sm-2" id="marks{{$s->id}}">
              <button type="submit" hidden name="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" ><i class="bi bi-check2-circle"></i></button>
            </form>
            @else
                @if ($s->marks<50)
                <td style="color: #FF0000 ;text-align:center">{{$s->marks}}</td>
                @else
                <td style="color: #2c0379;text-align:center">{{$s->marks}}</td>
                @endif

              @endif
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination justify-content-end mt-3">
    {!! $sub->links() !!}
</div>
@else
<div class="d-flex justify-content-center mt-5">
  <div class="search-card">
      <div class="row"><h4 class="search-font ">Can't find any Records </h4></div>
      <div class="row d-flex justify-content-center">
          <div class="col-md-4 mt-3 ">
              <img
                src="{{asset('assets/front/images/ass/rec.png')}}"
                alt="Trendy Pants and Shoes"
                class="img-fluid rounded-start d-flex "
              />
            </div>
      </div>
      </div>
</div>
@endif
</div>
<div class="col-4">
    <header class ="mb-3">Top 10 Marks in the Class:-</header>
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>Admision_No</th>
                    <th>Name</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hm as $key=> $h)
                <tr>
                <td>{{$h->admission_no}}</p></td>
                <td>{{$h->full_name}}</p></td>
                <td>{{$h->assessment_marks}}</p></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end mt-3">
            {!! $hm->links() !!}
        </div>
</div>
</div>

</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>
@endsection
