
@extends('layouts.MasterDashboard')


@section('content')
<div class="content">
        <div class="row">
            @foreach($data as $key=>$sub)
            <div class="col-sm-3">
                <div class="card">
                    <a href="{{route('teacher.materials',[$sub->classid,$sub->subjectid])}}" style="text-decoration:none;">
                  <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
                    <h2>{{$sub->class}}</h2>
                    <h3>{{$sub->subject}}</h3>
                    <div>
                      <!-- <p class="card-text">NO.of Teachers</p> -->
                    </div>
                  </div>
                </a>
                </div>
              </div>
              @endforeach
        </div>
</div>





@endsection





