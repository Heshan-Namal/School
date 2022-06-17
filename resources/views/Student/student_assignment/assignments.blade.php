@extends('layouts.MasterDashboard')

@section('content')
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>

    <div class="">
        <p>Today is {{ Carbon\Carbon::now()->format('Y-m-d')}} </p>
    </div>

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{ session('message') }}
          <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container-fluid">
        <div class="card w-75">

            <div class="card-header bg-warning text-white">
                <h4 >Due Assignments</h4>
            </div>

            @if(isset($assignmentListarr))
                <div class="card-body" style="background-color:#fd7e1410">
                    @foreach($assignmentListarr as $item)
                        <a href="{{route('student.uploadHomework',[$class_id,$subject_id,$item['id']]) }}" style="text-decoration: none;" >
                            <div class="card mb-3">
                                    <div class=" card-header ">
                                    <span class="h4">{{$item['title']}}</span>
                                    </div>
                                    <div class=" card-body row">
                                        <span class="h6 col">By  :  {{$item['teacher']}}</span>
                                        <span class="h6 col">Subject  :  {{$item['subject']}}</span>
                                    </div>
                            </div>
                        </a>   
                    @endforeach
                </div>
            @else
                <div class="card-body" style="background-color:#fd7e1410">
                    <span class="h5">Good job! you have no assignments to do</span>
                </div>
            @endif
        </div>

        <div class="card w-75 mt-4">
            <div class="card-header bg-success text-white">
                <h4 >uploaded Assignments</h4>
            </div>

            @if(isset($mergedAssList))
                <div class="card-body" style="background-color:#19875425">
                    @foreach($mergedAssList as $key=>$item)
                    <div class="card mb-3">
                        <div class=" card-header">
                            <div class="row">
                                <span class="h4 col-md-8 my-auto">{{$item['title']}}</span>
                                @if($item['grading_status']=='Grading in Progress')
                                    <div class="col-md-4 text-end my-auto">
                                        <span class="bg-info text-white rounded-pill px-2">{{$item['grading_status']}}</span>
                                    </div>
                                @else
                                    <div class="col-md-4 text-end my-auto">
                                        <span class="bg-success text-white rounded-pill px-2">{{$item['grading_status']}}</span>
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class=" card-body row">
                            <span class="h6 col my-auto">By  :  {{$item['teacher']}}</span>
                            <span class="h6 col my-auto">Subject  :  {{$item['subject']}}</span>
                            @if($item['grading_status']=='Graded')
                                <span class="h6 col my-auto text-end">Grade  :  {{$item['grade']}}</span>
                            @else
                                <span class="h6 col text-end"><a href="{{ route('student.editHomework',[$class_id,$subject_id,$item['id']]) }}"><button class="btn btn-outline-primary">Edit Submission</button></a></span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="card-body " style="background-color:#19875425">
                    <span class="h5">you haven't uploaded any assignments</span>
                </div>
            @endif    
        </div>
    </div>

 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection 