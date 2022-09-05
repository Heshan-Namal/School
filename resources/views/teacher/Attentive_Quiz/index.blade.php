@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/teacher.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <div class="row">
            <div class="row col-8">
                <div class="row g-3 mt-3 col-12 ">
                    <div class="col-4">
                        <div class="box-card">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/ass.png') }}" alt="Trendy Pants and Shoes"
                                        class="img-fluid rounded-start d-flex" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1">
                                            All <br>Attentiveness Checks
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{$uplod}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="box-card">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/no_pub.png') }}" alt="Trendy Pants and Shoes"
                                        class="img-fluid rounded-start d-flex" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1">
                                            Unublished <br>Attentiveness Checks
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{$stat}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="box-card">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/expired.png') }}" alt="Trendy Pants and Shoes"
                                        class="img-fluid rounded-start d-flex" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1">
                                            Today <br>Attentiveness Checks
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{$today}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <div class="row g-3 mt-4 col-12 ">

                <form action="#" method="GET" class="row g-3">@csrf
                    <div class="col-md-5">
                        <label for="inputState" class="form-label">Select Term</label>
                        <select name="term" id="term" onchange="getselector(this.value);"
                            class="form-control mt-3">
                            <option selected>Choose...</option>
                            <option value="allt">All Terms</option>
                            <option value="term1">First Term </option>
                            <option value="term2">Second Term </option>
                            <option value="term3">Third Term</option>
                        </select>
                    </div>
                    <div class="col-md-2">

                        <input type="submit" class="btn btn-primary mt-5 " name="submit" value="View">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4">
            <header class ="mb-3">Attentiveness Checks scheduled for today</header>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Period</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $key=>$l )
               <tr>
               <td><p class="mx-2">{{$l->title}}</p></td>
               <td><p class="mx-2">{{$l->period}}</p></td>
               <td><p class="mx-2">{{$l->status}}</p></td>
               @if ($l->status== 'draft')
               <form action="{{route('attentive.status',$l->id)}}" method="POST">@csrf
                <td><button class="btn btn-success btn-sm mx-1" type="submit" name="status" value="published" ><i class="bi bi-upload"></i></button></td>
               </form>
                @else
               <td><button class="btn btn-success btn-sm mx-1" disabled type="submit" name="status" value="published" ><i class="bi bi-upload"></i></button></td>
               @endif
               </tr>
               @endforeach
                </tbody>
            </table>
                {{-- <div class="pagination justify-content-end mt-3">
                    {!! $list->links() !!}
                </div> --}}
                {{-- <div class="row d-flex justify-content-center">
                    <div class="input-group"><header>View Attentiveness Checks Submissions today</header>
                        <a href="{{route('attentive.sumitindex',[$classid,$subjectid])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
                </div> --}}
        </div>
    </div>
    <header>Attentiveness Checks</header>
    <div class="text-end">
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Attentiveness Check</button>
        <a href="{{route('attentive.sumitindex',[$classid,$subjectid])}}">
            <button type="button" class="btn btn-primary mb-3">View Attentiveness Checks <br>Submissions today</button>
        </a>
    </div>
    {{-- <div class="text-end">
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Attentiveness Check</button>
    </div> --}}
    <form action="?" class="col-sm-2 me-auto" >
        <div class="col-12">
            <input type="text"  name="search" placeholder="Search......."  value="{{request()->search}}" class="form-control mb-2">
        </div>
    </form>



    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif


    @if(count($quizes)>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Term</th>
                <th>Published Week</th>
                <th>Date</th>
                <th>Period</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Add Question</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizes as $key=> $quiz)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$quiz->title}}</td>
                <td>{{$quiz->term}}</td>
                <td>{{$quiz->week}}</td>
                <td>{{$quiz->date}}</td>
                <td>{{$quiz->period}}</td>
                <td>{{$quiz->quiz_duration}}</td>
                <td>{{$quiz->status}}</td>
                <td>
                    @if($quiz->status=='draft')
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$quiz->id}}" >
                        Add Question</button>
                </td>
                    @else
                    <button class="btn btn-success btn-sm" disabled >
                        Add Question</button>
                </td>
                    @endif
                <td class="btn-toolbar">

                @if($quiz->status=='draft')

                <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editattModal" data-bs-id="{{$quiz->id}}" data-bs-title="{{$quiz->title}}"
                    data-bs-term="{{$quiz->term}}" data-bs-week="{{$quiz->week}}" data-bs-day="{{$quiz->date}}" data-bs-period="{{$quiz->period}}"
                    data-bs-duration="{{$quiz->quiz_duration}}"><i class="bi bi-pencil-square "></i></button>
                @else
                    <button class="btn btn-primary btn-sm mx-1"  disabled><i class="bi bi-pencil-square "></i> </button>

                @endif

                <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteattModal" data-bs-id="{{$quiz->id}}"><i class="bi bi-trash"></i></button>

                <form action="{{route('attentive.status',$quiz->id)}}" method="POST">@csrf
                    @if(($quiz->status=='draft') && ($quiz->date ==  \Carbon\Carbon::now()->format('Y-m-d') ))
                      <button class="btn btn-success btn-sm mx-1" type="submit" name="status" value="published" ><i class="bi bi-upload"></i></button>
                        {{-- <input type="submit" name="status" value="{{}}" class="btn btn-success btn-sm "> --}}
                      @else
                      <button class="btn btn-success btn-sm mx-1" disabled><i class="bi bi-upload"></i></button>
                      @endif

              </form>
              <a href="{{route('att.quizshow',[$quiz->id])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a>
            </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end mt-3">
        {!! $quizes->links() !!}
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

{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add Attentiveness Check</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attentiveness')
        </div>
    </div>
  </div>
</div>

{{-- modal for Question --}}
<div class="modal fade" id="qModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="exampleModalLabel" >Add Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attentivequestion')
        </div>

    </div>
  </div>
</div>

{{-- modal for edit --}}
<div class="modal fade" id="editattModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit Attentiveness Check</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attedit')
        </div>
    </div>
  </div>
</div>


{{-- delete modal --}}
<div class="modal fade" id="deleteattModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title table del text-center" id="example1ModalLabel">Delete Attentiveness Check</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body table">
            <form action="{{route('att.delete')}}" method="post"> @method('delete')
                @csrf
                <h5>Are you sure you want to delete this Attentiveness Check?</h5>
                <div class="row d-flex justify-content-end">
                    <div class="col-4 ">
                        <img
                          src="{{asset('assets/front/images/ass/delete.png')}}"
                          alt="Trendy Pants and Shoes"
                          class="img-fluid rounded-start d-flex "
                        />
                      </div>
                </div>
                <input type="hidden" id="quizid" name="quizid" >
                <div class="form-group d-flex justify-content-center">
                    <div class="modal-footer">
                     <button class="btn btn-danger" type="submit">Yes</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                   </div>
                 </div>
            </form>

        </div>
    </div>
  </div>
</div>





<script src="{{asset('assets/front/js/optionselector.js')}}"></script>


@endsection
