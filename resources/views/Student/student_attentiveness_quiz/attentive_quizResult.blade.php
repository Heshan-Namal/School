@extends('layouts.MasterDashboard')

@section('content')
<main class="py-4">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card wide-card">
                <div class="card-header">
                	<div class="row row-col-2">	
                		<span class="h3 col-sm-8 my-auto">{{$quiz->title}}</span>
                        <span class="rounded-pill h4 text-center text-white bg-success m-auto py-3 col-sm-4">You Scored {{$marks}} out of {{$question_count}}</span>
                	</div>
                </div>


                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                @foreach($questions as $key=>$q)

                @if(isset($key))
                    @if($answers_array[$key]==$correct_answers_array[$key])
                        <div class="card wide-card mb-4 border border-success border-4 rounded-3">
                    @else
                        <div class="card wide-card
                         mb-4 border border-danger border-4 rounded-3">
                    @endif
                @endif

                    <div class="card-header">
                        <h3>{{$key+1}}.{{$q->question}}</h3>
                    </div>

              
                        <div class="card-body">
                            <ol   class="ul-list"  style="list-style-type: lower-alpha;list-style: none" >
                                <li>&nbsp;<input class="form-check-input" disabled type="radio" id="answer1" name="{{$key}}" value="answer1"{{ $answers_array[$key] == 'answer1' ? 'checked' : '' }}  /> 
                                @if($correct_answers_array[$key] == 'answer1')
                                	<span class="text-white" style="background-color: Lightgreen">{{$q->answer1}}</span>
                                @else
                                	<span class="">{{$q->answer1}}</span>
                                @endif 
                                </li>

                                <li>&nbsp;<input class="form-check-input" disabled type="radio" id="answer2" name="{{$key}}" value="answer2" {{ $answers_array[$key] == 'answer2' ? 'checked' : '' }}  /> 
                                @if($correct_answers_array[$key] == 'answer2')
                                	<span class="text-white" style="background-color: Lightgreen">{{$q->answer2}}</span>
                                @else
                                	<span class="">{{$q->answer2}}</span>
                                @endif 
                                </li>

                                <li>&nbsp;<input class="form-check-input" disabled type="radio" id="answer3" name="{{$key}}" value="answer3" {{$answers_array[$key] == 'answer3' ? 'checked' : '' }}  /> 
                                	@if($correct_answers_array[$key] == 'answer3')
                                	<span class="text-white" style="background-color: Lightgreen">{{$q->answer3}}</span>
                                @else
                                	<span class="">{{$q->answer3}}</span>
                                @endif 
                                </li>

                                <li>&nbsp;<input class="form-check-input" disabled type="radio" id="answer4" name="answer{{$key}}" value="answer4" {{$answers_array[$key] == 'answer4' ? 'checked' : '' }}  /> 
                                @if($correct_answers_array[$key] == 'answer4')
                                	<span class="text-white" style="background-color: Lightgreen">{{$q->answer4}}</span>
                                @else
                                	<span class="">{{$q->answer4}}</span>
                                @endif 
                                </li>

                            </ol>
                        </div>

                        	@if(isset($key))
                        		@if($answers_array[$key]==$correct_answers_array[$key])
                        			<div class="card-footer bg-success" style="background-image:linear-gradient(90deg, green,white)">
                        				<span class="text-white">Your answer was correct.</span>
                        			</div>
                        		@else
                        			<div class="card-footer" style="background-image:linear-gradient(90deg, red,white)">
                        				<span class="text-white">Your answer was Incorrect.</span>

                        			</div>
                        		@endif
                        	@endif
                    </div>
                @endforeach

                </div>
                </div>
            
            </div>
        </div>
    </div>
</main>
@endsection