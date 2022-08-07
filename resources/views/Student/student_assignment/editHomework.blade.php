@extends('layouts.MasterDashboard')

@section('content')
    <!--container-->
    <div class="container-fluid w-50 ps-0 ms-0">
          
      <div class="card wide-card float-left">

        <div class="card-header">
          <span class="h4">{{$assessment->title}}</span>
        </div>

        <div class="card-body">
            <div class="row">
              <span class="col-md-10">{{$assessment->description}}</span>
              @if(isset($assessment->assessments))
                <a href="{{ asset($assessment->assessments) }}" target="_blank" class="btn col-md-2">View</a>
              @endif
            </div><hr>
            <form class="form form-group" method="POST" enctype="multipart/form-data" id="upload-file" action="{{route('Student.student.storeHomework',[$class_id,$subject_id,$assessment_id]) }}" >
             @csrf 

            <div class="row row-cols-2">
                      
                <label for="formtext" class="col-md-3 col-form-label mb-3">Submission name</label>
                <div class="col-md-9 mb-2">
                    <input type="text" class="form-control" name="name" placeholder="{{ $uploaded_assessment->submission_name }}" id="formtext" required>
                </div>

                <label for="formtext" class="col-md-3 col-form-label">Choose File</label>
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFile">
                </div>
            </div>
        </div>     
        
        <div class="card-footer">
              <div class="col">
                    <button class="btn btn-primary" type="submit" id="submit">Submit</button>
              </div>
        </div>
            </form>
      </div>
  </div>
@endsection