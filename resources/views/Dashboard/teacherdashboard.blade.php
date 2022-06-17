@extends('layouts.MasterDashboard')

@section('content')
<div class="content hh">
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel featured-carousel owl-theme" >
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
                            <div>
                                <p class="card-text">Chat</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                            <div class="card">
                                <div class="card-body">
                                <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
                                <div>
                                    <p class="card-text">Chat</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                                <div class="card">
                                    <div class="card-body">
                                    <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
                                    <div>
                                        <p class="card-text">Chat</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                    <div class="card">
                                        <div class="card-body">
                                        <img src="{{asset('assets/front/images/avatars/science.png')}}" class="rounded mx-auto d-block" alt="...">
                                        <div>
                                            <p class="card-text">Chat</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>

</div>

</div>
<div class="col-6">
    <div class="row">
            <h4 class="timetable">Timetable</h4>
    </div>
    <div class="row kk">
            <p>Today</p>
        <div class="col-6">
        <div class="card">
            <div class="card-body">place holder</div>
        </div>
        </div>

    </div>



</div>
</div>
@endsection
