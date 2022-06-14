@extends('layouts.MasterDashboard')

@section('content')
    <div class="content">
            <form  method="POST" enctype="multipart/form-data" id="" action="{{ route('Student.student.checkquiz',[$a_check_id]) }}" class="form-check"> @csrf
                <div class="card wide-card ps-0 ms-0 text-start">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"><span class="h3">{{$quiz->title}}</span></div>
                            <div class="col-md-4 text-end">
                                <span class="h3" id="minutes"></span>
                                <span class="h3" > : </span>
                                <span class="h3" id="seconds"></span>
                            </div>
                        </div>
                    </div>

                @foreach($questions as $key=>$q)
                <div class="card wide-card m-3 text-start">
                    <div class="card-header">
                        <h5>{{$key+1}}.{{$q->question}}</h5>
                    </div>
                        
                        <div class="card-body wide-card">
                            <ol   class="ul-list"  style="list-style-type: lower-alpha;list-style: none" >
                                <li>&nbsp;<input class="form-check-input" type="radio" id="answer1" name="{{$key}}" value="answer1" required /> 
                                    <label class="form-check-label" for="answer1">{{$q->answer1}}</label>
                                </li>

                                <li>&nbsp;<input class="form-check-input" type="radio" id="answer2" name="{{$key}}" value="answer2" /> {{$q->answer2}}
                                </li>

                                <li>&nbsp;<input class="form-check-input" type="radio" id="answer3" name="{{$key}}" value="answer3" /> {{$q->answer3}}
                                </li>

                                <li>&nbsp;<input class="form-check-input" type="radio" id="answer4" name="{{$key}}" value="answer4"/> {{$q->answer4}}
                                </li>

                            </ol>
                        </div>
                </div>
                @endforeach
                        <div class="card-footer text-center">
                            <button id="submit" type="Submit" class="btn btn-primary btn-l my-auto">Submit</button>
                        </div>
                </div>
            </form>   
        </div>
@endsection

@section('script')
    <script src="{{ asset('assets/front/js/student/countdown_timer.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        console.log("hello")
        var time = '00:00:30'
        var timerstts = setTimeout(timer(time),time)
        console.log(timerstts)
        var timeobj = {};
        timeobj.timerstts= time;
        function chckfunction(){
            if (document.querySelector('#output').value= "time over") {
                console.log('aafafafafa')
            }else{
                console.log('afffffff')
            }
        }
        setTimeout(chckfunction(),time)

        {$.ajax({
                    url: "{{route('Student.student.showquiz',[$quiz->id])}}",
                    cache:false,
                    type: "GET",
                    data:timeobj,
                }).done(function(data) {
                      console.log('data sent');
                });
        }
    </script>
@endsection