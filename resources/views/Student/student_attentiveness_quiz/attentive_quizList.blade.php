@extends('layouts.MasterDashboard')

@section('content')
<!--container-->
<div class="content">
    
    @php 
        if(isset($quizListarr)){
            $newquizarr = [];
            $missedquizarr = [];
            foreach($quizListarr as $key => $item){
                $validtime=explode(":",$item['quiz_duration'] );
                $minutes=$validtime[1];
                $start = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo');
                $end = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo')->addMinutes((int)$minutes);
                $now = Carbon\Carbon::now('Asia/Colombo');

                $item['end_time']=$end->format('Y-m-d H:i:s');

                if($start->lt($now) && $end->gt($now) && $item['status']=='published'){
                    $newquizarr[]=$item;
                }elseif($start->lt($now) && $end->lt($now) && $item['status']=='published'){
                    $missedquizarr[]=$item;
                }
            }
        }
    @endphp
         
    <div class="row">
        <div class=col-sm-12>
            <div class="card wide-card"  style="background-color:#fd7e1405">
                <div class="card-header bg-warning text-white">
                    <span class="my-auto h3" >New Quizzes</span>
                </div>
        
                @if(isset($newquizarr) && !empty($newquizarr))
                    @foreach($newquizarr as $item)
                            <div class="card wide-card m-3">
                                    <div class="card-header position-relative">
                                        <span class="h3 my-auto">{{$item['title']}}</span>
                                        <a href="{{route('Student.student.showquiz',$item['id']) }}" style="text-decoration: none;" >
                                            <button class="btn btn-outline-primary mx-1 position-absolute top-50 end-0 translate-middle-y" id="control">Attemt Quiz</button>
                                        </a>
                                    </div>
                                    <div class=" card-body wide-card">
                                        <div class="row row-cols-2">
                                            <span class="h5 col mt-2">Subject  :  {{$item['subject_name']}}</span>
                                            <span class="h5 col ">Duration  :  {{$item['quiz_duration']}}</span>
                                            <span class="h5 col ">From  :  {{$item['updated_at']}}</span>
                                            <span class="h5 col text-end">To  :  {{$item['end_time']}}</span>
                                        </div>
                                    </div>
                            </div>
                        @endforeach    
                    @else
                        <div class="card-body wide-card" style="background-color:#fd7e1405">
                            <span class="h4">No Quizzes available</span>
                        </div>
                    @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card wide-card mt-4"  style="background-color:#44D62C10">
                <div class="card-header bg-success text-white">
                    <span class="my-auto h3 " >Completed Quizzes</span>
                </div>
                
                @if(isset($attemptedquizarr))
                    @foreach($attemptedquizarr as $item)
                        @php 
                            $validtime=explode(":",$item['quiz_duration'] );
                            $minutes=$validtime[1];
                            $start = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo');
                            $end = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo')->addMinutes((int)$minutes);
                            $item['end_time']=$end->format('Y-m-d H:i:s');
                            $now = Carbon\Carbon::now('Asia/Colombo');
                        @endphp
                        <div class="card wide-card m-3">
                            <div class=" card-header h3 my-auto position-relative">
                                <span class="text-dark">{{$item['title']}}</span>
                                <a href="{{route('Student.student.quizresult',$item['id']) }}" style="text-decoration: none;" >
                                    <button class="btn btn-outline-primary mx-1 position-absolute top-50 end-0 translate-middle-y" id="view_results">View Quiz Results</button>
                                </a>
                            </div>
                            <div class="card-body wide-card ">
                                <div class="row row-cols-2">
                                    <span class="h5 col mt-2">Subject  :  {{$item['subject_name']}}</span>
                                    <span class="h5 col ">Duration  :  {{$item['quiz_duration']}}</span>
                                    <span class="h5 col my-auto">From  :  {{$item['updated_at']}}</span><br>
                                    <span class="h5 col my-auto text-end">To  :  {{$item['end_time']}}</span><br>
                                </div>
                            </div>

                            <div class="card-footer">
                                <span class="h4 mt-2 text-primary">Your Marks  :  {{$item['total_points']}}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card-body wide-card" style="background-color:#44D62C10">
                        <span class="h4">You haven't completed any Quizzes</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-sm-12">
            <div class="card wide-card mt-4 " style="background-color:#dc354505">
                <div class="card-header bg-danger text-white">
                    <span class="my-auto h3" >Missed Quizzes</span>
                </div>
                @if(isset($missedquizarr) && !empty($missedquizarr))
                    @foreach($missedquizarr as $item)
                        @php 
                            $validtime=explode(":",$item['quiz_duration'] );
                            $minutes=$validtime[1];
                            $start = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo');
                            $end = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item['updated_at'],'Asia/Colombo')->addMinutes((int)$minutes);
                            $item['end_time']=$end->format('Y-m-d H:i:s');
                            $now = Carbon\Carbon::now('Asia/Colombo');
                        @endphp
                        <div class="card wide-card m-3">
                            <span class=" card-header h3 my-auto">{{$item['title']}}</span>
                            <div class=" card-body ">
                                <div class=" row row-cols-2">
                                    <span class="h5 col ">From  :  {{$item['updated_at']}}</span>
                                    <span class="h5 col text-end">To  :  {{$item['end_time']}}</span>
                                    <span class="h5 col ">Duration  :  {{$item['quiz_duration']}}</span>
                                    <span class="h5 col mt-2">Subject  :  {{$item['subject_name']}}</span>                                        
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @else
                    <div class="card-body wide-card" style="background-color:#dc354505">
                        <span class="h4">Great ! You haven't Missed any Quizzes</span>
                    </div>
                @endif    
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/front/js/student_js/quizstatus.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">

    </script>
@endsection