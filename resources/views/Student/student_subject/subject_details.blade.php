@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row ">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Lesson Details
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card wide-card">
                            @foreach($data as $item)
                            <div class="card-header">
                                <span class="h4"> {{$item->subject_name}} </span>
                            </div>
                            <div class="card-body row">
                                    <div class="col">
                                        <img class="row" src="{{$item->photo}}" alt="">
                                        <span class="row">Teacher : {{$item->full_name}}</span>
                                    </div>
                                    <div class="col">
                                        <span class="row">Topic:{{getTodayClassDetails($subject_id)}}</span>
                                        <span class="row">Chapter:</span>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Quizzes
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <!-- Quizzes -->
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Assessments
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <!-- Assessments -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection