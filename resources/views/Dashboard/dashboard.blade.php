@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/card.css')}}">
@endsection

@section('content')
<div class="content">
    @if(Qs::userIsTeamAd())
    <div class="row mt-2">
        <div class="d-flex flex-row-reverse bd-highlight">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#menualModal">
                Admin manual
            </button>
        </div>
    </div>
    @endif

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> {{ Breadcrumbs::render('Dashboard') }} </li>
    </ol>


    @if(Qs::userIsTeamAd())


    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/student.png')}}" class="rounded mx-auto d-block"
                        alt="...">

                    <h2 class="card-title fw-bold">{{$student}}</h2>
                    <div>
                        <p class="card-text">NO.of Students</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block"
                        alt="...">
                    <h2 class="card-title fw-bold">{{$teacher}}</h2>
                    <div>
                        <p class="card-text">NO.of Teachers</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block"
                        alt="...">
                    <h2 class="card-title fw-bold">{{$class_teacher}}</h2>
                    <div>
                        <p class="card-text">NO.of Class Teachers</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/class.png')}}" class="rounded mx-auto d-block"
                        alt="...">
                    <h2 class="card-title fw-bold">{{$grades}}</h2>
                    <div>
                        <p class="card-text">NO.of Grades</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <a href="{{route('admin.student')}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/avatars/addStudent.png')}}"
                            class="rounded mx-auto d-block" alt="...">
                        <div>
                            <p class="card-text">Add Student</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('admin.teacher')}}">
                <div class="card">
                    <div class="card-body ">
                        <img src="{{asset('assets/front/images/avatars/addStudent.png')}}"
                            class="rounded mx-auto d-block" alt="...">
                        <div>
                            <p class="card-text align-text-bottom">Add Teacher</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{route('admin.grade')}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/avatars/class.png')}}" class="rounded mx-auto d-block"
                            alt="...">
                        <div>
                            <p class="card-text">Add Grade</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if(Qs::userIsTeamLe())
    @include('Dashboard.studentDashboard')
    @endif
    @if(Qs::userIsTeamTe())
    <a href="{{route('lead.index')}}"></a>
    {{-- @include('Dashboard.teacherdashboard') --}}
    {{-- <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block"
    alt="...">
    <div>
        <p class="card-text">Subjects</p>
    </div>
</div>
</div>
</div>
<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
            <div>
                <p class="card-text">Chat</p>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
            <div>
                <p class="card-text">Record Book</p>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
            <div>
                <p class="card-text">My Timetable</p>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
            <div>
                <p class="card-text">Profile</p>
            </div>
        </div>
    </div>
</div>
</div> --}}

@endif
</div>

<!-- menual Modal -->
<div class="modal fade" id="menualModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Admin manual read first</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Add teachers</li>
                    <li>Add grades</li>
                    <li>Click 'Edit' to add grade subjects & classes</li>
                    <li>Inside grades edit click view to add subject for class </li>
                    <li>Finally add students</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endsection