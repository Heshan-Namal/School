@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="termDropdown">
            <button onclick="dropdownFunction()" class="term-dropbtn">Term</button>
            <div id="termDropdown" class="term-dropdown-content">
                <div id="term1" onclick="changeTerm(id)">Term 1</div>
                <div id="term2" onclick="changeTerm(id)">Term 2</div>
                <div id="term3" onclick="changeTerm(id)">Term 3</div>
            </div>
        </div>

        <div id="term-display" class="col-sm-12 text-center h4 mb-4">Term 1</div>

    </div>

    <div id="term-1" class="row">
        @for($i=1; $i<= 12; $i++) <div class="col-sm-3">
            <a style="text-decoration: none" href="{{route('Student.student.subject_week_day',[$class_id,$subject_id,1,$i])}}">

                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/avatars/week.png')}}" class="rounded mx-auto d-block" alt="...">
                        <div>
                            <p class="card-text">Week {{$i}}</p>
                        </div>
                    </div>
                </div>

            </a>
    </div>
    @endfor
</div>

<div id="term-2" class="row">
    <div id="term-display" class="col-sm-12"></div>
    @for($i=1; $i<= 12; $i++) <div class="col-sm-3">
        <a style="text-decoration: none" href="{{route('Student.student.subject_week_day',[$class_id,$subject_id,2,$i])}}">

            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/week.png')}}" class="rounded mx-auto d-block" alt="...">
                    <div>
                        <p class="card-text">Week {{$i}}</p>
                    </div>
                </div>
            </div>

        </a>
</div>
@endfor
</div>

<div id="term-3" class="row">
    <div id="term-display" class="col-sm-12"></div>
    @for($i=1; $i<= 12; $i++) <div class="col-sm-3">
        <a style="text-decoration: none" href="{{route('Student.student.subject_week_day',[$class_id,$subject_id,3,$i])}}">

            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/week.png')}}" class="rounded mx-auto d-block" alt="...">
                    <div>
                        <p class="card-text">Week {{$i}}</p>
                    </div>
                </div>
            </div>

        </a>
</div>
@endfor
</div>

</div>

@endsection

@section('script')
<script src="{{asset('assets/front/js/student/termSelection.js')}}"></script>
@endsection