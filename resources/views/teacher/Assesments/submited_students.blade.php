@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row hh mb-5">
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
                        Numer of Students submit Assesment
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
                          Num Students Late Submissions
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
                               Not add marks for Submission
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
                                    Num Students not submited Assesment
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

    <div class="row">
        <div class="col-8">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <div class="head mb-4">
                <p><u>Submitted Student Details</u> :-</p>
            </div>
            <div class="text-end">
                <form action="?" class="col-sm-2 me-auto" >
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary"> Go!</button>
                        <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">

                     </div>
                </form>
            </div>
<div class="table-card mt-2">
    <table class="table table-success table-hover m-0" style="border-spacing:0px;">
            <thead>

            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">submisson file</th>
              <th scope="col">Due Date</th>
              <th scope="col">uploaded date</th>
              <th scope="col">Marks(less than 50=red)</th>

            </tr>
            </thead>
            <tbody>
                @if($sub->count()>0)

                @foreach($sub as $key=> $s)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$s->name}}</td>
              @if($s->type == 'upload_file')
                <td>{{$s->file}}</td>
                @else
                <td>Type is MCQ</td>
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



            @else
            <div class="d-flex justify-content-center mb-5">
                <div class="search-card">
                    <div class="row"><h4 class="search-font ">Can't Find Any Records </h4></div>
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

    </tbody>
</table>
</div>
</div>
        <div class="col-4">
            <div class="d-card overflow-auto mt-3">
                <div class="card-header colo card-text">Highest Ten Marks In the Class :-</div>
                <div class="card-body">
                   <table class="table p-2"><tr><th scope="col">Admision_No</th><th scope="col">Name</th><th scope="col">Marks</th></tr>
                 @foreach($hm as $key=> $h)
                   <tr>
                   <td><p class="mx-4">{{$h->admission_no}}</p></td>
                   <td><p class="mx-4">{{$h->full_name}}</p></td>
                   <td><p class="mx-4">{{$h->assessment_marks}}</p></td>
                   </tr>
                   {{-- <div class="row">
                    <div class="col-2">
                        <p>{{$n->title}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$n->due_date}}</p>
                    </div>
                   </div> --}}
@endforeach
                   </table>
                </div>

            </div>

        </div>
</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>

@endsection
