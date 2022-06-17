@extends('layouts.MasterDashboard')


@section('content')
<div class="content">
@if(Qs::userIsTeamAd())
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/student.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">250</h2>
        <div>
          <p class="card-text">NO.of Students</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">250</h2>
        <div>
          <p class="card-text">NO.of Teachers</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">250</h2>
        <div>
          <p class="card-text">NO.of Class Teachers</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/class.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">250</h2>
        <div>
          <p class="card-text">NO.of Classes</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/addStudent.png')}}" class="rounded mx-auto d-block" alt="...">
        <div>
          <p class="card-text">Add Student</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body ">
        <img src="{{asset('assets/front/images/avatars/addStudent.png')}}" class="rounded mx-auto d-block" alt="...">
        <div>
          <p class="card-text align-text-bottom">Add Teacher</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/addStudent.png')}}" class="rounded mx-auto d-block" alt="...">
        <div>
          <p class="card-text">Add Class</p>
        </div>
      </div>
    </div>
  </div>
</div>
       @endif
       @if(Qs::userIsTeamLe())
      <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Science</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Sinhala</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Maths</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Buddisht</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">History</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">English</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Music</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Art</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">Accounting</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
              <div>
                <p class="card-text">ICT</p>
              </div>
            </div>
          </div>
        </div>

      </div>
       @endif
       @if(Qs::userIsTeamTe())

      @include('Dashboard.teacherdashboard')
       {{-- <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
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
@endsection

