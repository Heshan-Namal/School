@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <div class="row g-3">
        <div class="col-md-6">
            <header class ="mb-3">Most Recent Class Links</header>

            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th>Chapter</th>
                        <th>Period</th>
                        <th>Published Date</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clink as $key=> $c)
                        <tr>
                        <td>{{$c->chapter}}</td>
                        <td>{{$c->period}}</td>
                        <td>{{$c->date}}</td>
                        {{-- <td>{{ \Carbon\Carbon::parse($c->created_at)->format('d/m/Y') }}</td> --}}
                        <td><a href="{{$c->resource_file}}"><button type="button" class="btn btn-primary btn-sm">Link</button></a></td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end mt-3">
                {!! $clink->links() !!}
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-md-5">
            <header class ="mb-3">Most Recent Notes</header>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th>Chapter</th>
                        <th>Note</th>
                        <th>Published Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($note as $key=> $n)
                        <tr>
                        <td>{{$n->chapter}}</td>
                        <td><a href="http://127.0.0.1:8000/notes/{{$n->resource_file}}">{{$n->resource_file}}</a></td>
                        <td>{{$n->date}}</td>
                        {{-- <td>{{ \Carbon\Carbon::parse($n->created_at)->format('d/m/Y') }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end mt-3">
                {!! $note->links() !!}
            </div>
        </div>
    </div>
    <div class="row g-3 ">
        <header class ="mb-3">View All Resources</header>
        <form action="#" method="GET" class="row g-3">@csrf
            <div class="col-md-3">
                <label for="inputState" class="form-label">Select Term</label>
                <select name="term" id="term" onchange="getselector(this.value);" class="form-control mt-0">
                    <option selected value="">Choose...</option>
                    <option value="allt" >All Terms</option>
                    <option value="term1">First Term </option>
                    <option value="term2">Second Term </option>
                    <option value="term3">Third Term</option>
                </select>
            </div>
            <div class="col-md-3" id="day1" hidden>
                <label for="inputState" class="form-label">Select Date</label>
                <select name="day" id="day" class="form-control mt-0" aria-label="Default select example">
                    <option selected value="">Choose...</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wensday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="submit" class="btn btn-primary" name="submit" value="View">
            </div>
        </form>
    </div>


    <div class="row g-3 mt-2">
        <div class="text-end">
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Resource</button>
        </div>
    </div>


    <form action="?" class="col-sm-2 me-auto" >
        <div class="col-12">
            <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
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


    @if($res->count()>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Chapter</th>
                <th>Term</th>
                <th>Week</th>
                <th>Day</th>
                <th>Published Date</th>
                <th>Type</th>
                <th>Resource</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($res as $key=> $r)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$r->chapter}}</td>
                <td>{{$r->term}}</td>
                <td>{{$r->week}}</td>
                <td>{{$r->day}}</td>
                <td>{{$r->date}}</td>
                <td>{{$r->resource_type}}</td>
                @if($r->resource_type == 'reference_link')

                        <td><a href="{{$r->resource_file}}"><button type="button" class="btn btn-primary btn-sm">Ref-Link</button></a></td>

                @elseif ($r->resource_type == 'class_link')

                        <td><a href="{{$r->resource_file}}"><button type="button" class="btn btn-primary btn-sm">Class-Link</button></a></td>
                @else
                        <td><a href="http://127.0.0.1:8000/notes/{{$r->resource_file}}">{{$r->resource_file}}</a> </td>

                @endif
                <td class="btn-toolbar">
                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editresModal" data-bs-id="{{$r->id}}" data-bs-chapter="{{$r->chapter}}" data-bs-topic="{{$r->topic}}"
                    data-bs-term="{{$r->term}}" data-bs-week="{{$r->week}}" data-bs-period="{{$r->period}}" data-bs-date="{{$r->date}}" data-bs-day="{{$r->day}}" data-bs-resource_type="{{$r->resource_type}}"
                    data-bs-resource_file="{{$r->resource_file}}" ><i class="bi bi-pencil-square "></i> </button>
                    <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteresModal" data-bs-id="{{$r->id}}"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            @endforeach
            <div class="pagination justify-content-end mt-3">
                {!! $res->links() !!}
            </div>
        </tbody>
    </table>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/front/js/resourcesselector.js')}}"></script>
@endsection


{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add Resource</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.rescreate')
        </div>
    </div>
  </div>
</div>
</div>


   {{-- modal for edit --}}
   <div class="modal fade" id="editresModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit Resource</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.resedit')
        </div>
    </div>
  </div>
</div>

{{-- delete modal --}}
<div class="modal fade" id="deleteresModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title table del text-center" id="example1ModalLabel">Delete Resource</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body table">
            <form action="{{route('res.delete')}}" method="post"> @method('delete')
                @csrf
                <h5>Are you sure you want to delete this resource?</h5>
                <div class="row d-flex justify-content-end">
                    <div class="col-4 ">
                        <img
                          src="{{asset('assets/front/images/ass/delete.png')}}"
                          alt="Trendy Pants and Shoes"
                          class="img-fluid rounded-start d-flex "
                        />
                      </div>
                </div>
                <input type="hidden" id="resid" name="resid" >
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
