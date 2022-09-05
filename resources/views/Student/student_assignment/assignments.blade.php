@extends('layouts.MasterDashboard')

@section('content')


    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{ session('message') }}
          <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class=" wider-card col-sm-6">
                <div class="card-header bg-warning text-white">
                    <h4 >Due Assignments</h4>
                </div>
                @if(isset($due_assignmentsArr))
                    <div class="card-body overflow-scroll due-body" style="background-color:#fd7e1410">
                        
                        @foreach($due_assignmentsArr as $item)
                            @if($item['assessment_type']=="upload_file")
                                <div class="card wider-card mb-3">
                                        <div class=" card-header position-relative ">
                                        <ion-icon name="document-attach" style="font-size: 24px;color: #318CE7;"></ion-icon>&nbsp;
                                        <span class="h4">{{$item['title']}}</span>
                                        <a href="{{route('Student.student.uploadHomework',[$class_id,$subject_id,$item['id']]) }}" style="text-decoration: none;" >
                                            <button class=" mt-1 btn btn-primary position-absolute top-0 end-0 translate-middle-x">Submit</button>
                                        </a>
                                        </div>
                                        <div class=" card-body row row-cols-2">
                                            <span class="h6 col">Description  :  {{$item['description']}}</span>
                                            <span class="h6 col">Assessment File  :<a href="http://127.0.0.1:8000/assignments/{{$item['assessment_file']}}">{{$item['assessment_file']}}</a></span>
                                            <span class="h6 col">Due Date  :  {{$item['due_date']}}</span>
                                            <span class="h6 col">By  :  {{$item['teacher']}}</span>

                                        </div>
                                </div>
                            @elseif($item['assessment_type']=="mcq_quiz")
                                <div class="card wider-card mb-3">
                                        <div class=" card-header position-relative ">
                                        <ion-icon name="help" style="font-size: 24px;color: #318CE7;"></ion-icon>&nbsp;
                                        <span class="h4">{{$item['title']}}</span>
                                        <a href="{{route('Student.student.showQuiz',[$item['id']]) }}" style="text-decoration: none;" >
                                            <button class=" mt-1 btn btn-primary position-absolute top-0 end-0 translate-middle-x">Attempt</button>
                                        </a>
                                        </div>
                                        <div class=" card-body row row-cols-2">
                                            <span class="h6 col">Description  :  {{$item['description']}}</span>
                                            <span class="h6 col">By  :  {{$item['teacher']}}</span>
                                            <span class="h6 col">Due Date  :  {{$item['due_date']}}</span>
                                        </div>
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

            <div class=" wider-card col-sm-6 ">
                <div class="row ms-2">
                        <div class="card-header bg-success text-white">
                            <h4 >uploaded Assignments</h4>
                        </div>
                        @if(isset($mergedAssList))
                            <div class="card-body overflow-scroll upload-body" style="background-color:#19875425">
                                @foreach($mergedAssList as $key=>$item)
                                <div class="card wider-card mb-3">
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

                                    <div class=" card-body row row-cols-2">
                                        <span class="h6 col my-auto">Description  :  {{$item['description']}}</span>
                                        <span class="h6 col my-auto"></span>
                                        <span class="h6 col my-auto">By  :  {{$item['teacher']}}</span>
                                        @if(isset($item['assessment_marks']))
                                            <span class="h6 col my-auto text-end">Grade  :  {{$item['assessment_marks']}}</span>
                                        @elseif(isset($item['answer_file']))
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

                    <div class="row mt-4 ms-2">
                    <div class="card-header bg-danger text-white">
                            <h4 >Overdue Assignments</h4>
                        </div>

                        @if(isset($overdue_assignmentsArr))
                            <div class="card-body overflow-scroll overdue-body" style="background-color:#F2003C25">
                                @foreach($overdue_assignmentsArr as $key=>$item)
                                <div class="card wider-card mb-3">
                                    <div class=" card-header">
                                        <div class="row row-col-2">
                                            <span class="h4 col">{{$item['title']}}</span>
                                            <div class="col text-end">
                                                <span class="bg-danger text-white rounded-pill px-4">Overdue</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" card-body row row-cols-2">
                                        <span class="h6 col my-auto">Description  :  {{$item['description']}}</span>
                                        <span class="h6 col my-auto">By  :  {{$item['teacher']}}</span>
                                            <span class="h6 col my-auto text-danger">Was Due on  :  {{$item['due_date']}}</span>
                                            <span class="h6 col text-end"></span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="card-body " style="background-color:#F2003C25">
                                <span class="h5">you don't have any Overdue assignments</span>
                            </div>
                        @endif 

                    </div>
                </div>   
        </div>
    </div>
@endsection
