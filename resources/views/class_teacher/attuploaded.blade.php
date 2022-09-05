@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <header >Attendance Marking</header>
        <form action="{{route('addattendance',[$dd->id])}}" method="GET" class="row g-3">@csrf
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
        <header class ="mb-3">Add Attendance {{$term}} </header>

        <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject Name</th>
                                        <th>Add</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=> $s)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$s->subject_name}}</td>
                                        {{-- <td>{{$s->attendance_file}}</td> --}}
                                        <td>
                                            @if ($sub[$s->subjectid]!='no')
                                            <button class="btn btn-primary btn-sm" disabled>ADD</button>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal" data-bs-subjectid="{{$s->subjectid}}" data-bs-file="{{$sub[$s->subjectid]}}"  >EDIT</button>
                                            @else
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createmodal" data-bs-subjectid="{{$s->subjectid}}">ADD</button>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal" disabled>EDIT</button>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($sub[$s->subjectid]!='no')
                                                    <p>Uploaded</p>
                                            @else
                                                    <p>Not Uploaded</p>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
</div>


{{-- store modal --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Upload the Attendance Excel File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            <form action="{{route('attendance.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="form-group mb-4">
                    <input type="hidden" class="form-control " name="class_id" value="{{$dd->id}}">
                </div>

                <div class="form-group mb-4">
                    <input type="hidden" class="form-control" name="subject_id" id="subjectid">
                </div>
                <div class="form-group mb-4">
                    <input type="hidden" class="form-control" name="term" value="{{$term}}">
                </div>

                <div class="form-group mb-4" id="file">
                    <label for="name" id="file">Upload the File</label>
                    <input type="file" class="form-control" @error('attendance_file') is-invalid @enderror name="attendance_file">
                    @error('attendance_file')
                             <span class="invalid-feedback" role="alert">
                                 <strong>only Excel can upload</strong>
                             </span>
                     @enderror
                </div>

             <div class="form-group">
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button class="btn btn-primary" type="submit">Save</button>
               </div>
             </div>

     </form>
        </div>
    </div>
  </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit Uploaded Attendance Excel File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            <form action="{{route('update.attendance')}}" method="POST" enctype="multipart/form-data" > @method('PUT') @csrf
                <div class="form-group mb-4">
                    <input type="hidden" class="form-control " name="class_id" value="{{$dd->id}}">
                </div>

                <div class="form-group mb-4">
                    <input type="hidden" class="form-control" name="subject_id" id="subjectid">
                </div>
                <div class="form-group mb-4">
                    <input type="hidden" class="form-control" name="term" value="{{$term}}">
                </div>

                <div class="form-group mb-4" id="file">
                    <label for="name" id="file">Upload the File</label>
                    <input type="file" class="form-control" @error('attendance_file') is-invalid @enderror name="attendance_file">
                    <input type="text" disabled class="form-control" id="attendance_file">
                    @error('attendance_file')
                             <span class="invalid-feedback" role="alert">
                                 <strong>only Excel can upload</strong>
                             </span>
                     @enderror
                </div>

             <div class="form-group">
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button class="btn btn-primary" type="submit">Save</button>
               </div>
             </div>

     </form>
        </div>
    </div>
  </div>
</div>








<script src="{{asset('assets/front/js/attendance.js')}}"></script>



@endsection


