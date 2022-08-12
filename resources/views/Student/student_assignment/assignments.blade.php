@extends('layouts.MasterDashboard')

@section('content')


    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{ session('message') }}
          <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container-fluid">
        <div class="card wide-card">

            <div class="card-header bg-warning text-white">
                <h4 >Due Assignments</h4>
            </div>

           

            @if(isset($assessmentListarr))
                <div class="card-body" style="background-color:#fd7e1410">
                    
                    @foreach($assessmentListarr as $item)
                        <div>
                        @if($item['assessment_type']=="upload_file")
                        <a href="{{route('Student.student.uploadHomework',[$class_id,$subject_id,$item['id']]) }}" style="text-decoration: none;" >
                            <div class="card wide-card mb-3">
                                    <div class=" card-header ">
                                    <span class="h4">{{$item['title']}}</span>
                                    </div>
                                    <div class=" card-body row row-col-2">
                                        <span class="h6 col">Subject  :  {{$item['subject']}}</span>
                                        <span class="h6 col">Assessment File  :  {{$item['assessment_file']}}</span>
                                        <span class="h6 col">Due Date  :  {{$item['due_date']}}</span>
                                        <span class="h6 col">By  :  {{$item['teacher']}}</span>
                                        <span class="h6 col">Allocated Marks  :  {{$item['allocated_marks']}}</span>

                                    </div>
                            </div>
                        </a>
                        </div> 
                        @elseif($item['assessment_type']=="mcq_quiz")
                        <a href="{{route('Student.student.uploadHomework',[$class_id,$subject_id,$item['id']]) }}" style="text-decoration: none;" >
                            <div class="card wide-card mb-3">
                                    <div class=" card-header ">
                                    <span class="h4">{{$item['title']}}</span>
                                    </div>
                                    <div class=" card-body row">
                                        <span class="h6 col">By  :  {{$item['teacher']}}</span>
                                        <span class="h6 col">Subject  :  {{$item['subject']}}</span>
                                        <span class="h6 col">Allocated Marks  :  {{$item['allocated_marks']}}</span>
                                        <span class="h6 col">Due Date  :  {{$item['due_date']}}</span>
                                    </div>
                            </div>
                        </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="card-body" style="background-color:#fd7e1410">
                    <span class="h5">Good job! you have no assessments to do</span>
                </div>
            @endif
        </div>

        <div class="card wide-card mt-4">
            <div class="card-header bg-success text-white">
                <h4 >uploaded Assignments</h4>
            </div>

            @if(isset($mergedAssList))
                <div class="card-body" style="background-color:#19875425">
                    @foreach($mergedAssList as $key=>$item)
                    <div class="card wide-card mb-3">
                        <div class=" card-header">
                            <div class="row row-col-2">
                                <span class="h4 col">{{$item['title']}}</span>
                                @if(isset($item['assessment_marks']))
                                    <div class="col text-end">
                                        <span class="bg-success text-white rounded-pill px-4">Graded</span>
                                    </div>
                                @else
                                    <div class="col text-end my-auto">
                                        <span class="bg-info text-white rounded-pill px-4">Grading in Progress</span>
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class=" card-body row">
                            <span class="h6 col my-auto">By  :  {{$item['teacher']}}</span>
                            <span class="h6 col my-auto">Subject  :  {{$item['subject']}}</span>
                            @if(isset($item['assessment_marks']))
                                <span class="h6 col my-auto text-end">Grade  :  {{$item['assessment_marks']}}</span>
                            @else
                                <span class="h6 col text-end"><a href="{{ route('Student.student.editHomework',[$class_id,$subject_id,$item['id']]) }}">
                                    <button class="btn btn-outline-primary">Edit Submission</button></a>
                                </span>
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

@endsection
