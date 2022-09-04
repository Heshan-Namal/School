@extends('layouts.MasterDashboard')

@section('content')
<div class="container">

    <div class="main-body">
        @foreach ($result2 as $item2)
        @foreach($result as $item)
        <div class="row">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('assets/front/images/avatars/avatar3.jpeg')}}" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4{>{{$item->full_name}}</h4>
                                    @if(Qs::userIsTeamLe())

                                    <p class="text-secondary mb-1">Grade 1 Class A</p>
                                    @endif<br>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#changepic">Change Picture</button>
                                    <!-- <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                        @if(Qs::userIsTeamLe())
                        @foreach ($result3 as $item3)
                        <hr class="my-4">
                        <p class="h3 text-primary">Comments </p>
                        <hr class="my-4">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{$item3->sender_id}}
                                        <span class="badge rounded-pill bg-danger">{{$item3->status}}</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{$item3->comment}}</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        {{$item3->name}}

                                        <span class="badge rounded-pill bg-danger">{{$item3->status}}</span>

                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is
                                        intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                        first item's accordion body.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is
                                        intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                        third item's accordion body. Nothing more exciting happening here in terms of
                                        content, but just filling up the space to make it look, at least at first
                                        glance, a bit more representative of how this would look in a real-world
                                        application.</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- Bio data change -->

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('Update.Profile') }}">
                            @csrf
                            @if(Qs::userIsTeamAd())
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->full_name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item2->email}}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->contact_no}}" name="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->adress}}" name="address">
                                </div>
                            </div>

                            @endif
                            @if(Qs::userIsTeamTe())
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->full_name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item2->email}}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->contact_no}}" name="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->address}}" name="address">
                                </div>
                            </div>
                            @endif
                            @if(Qs::userIsTeamLe())
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->full_name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item2->email}}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" class="form-control" value="{{$item->dob}}" name="dob">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">guardian Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->guardian_name}}"
                                        name="gname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gurdian Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="{{$item->guardian_email}}"
                                        name="gemail">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gurdian Contact no</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->guardian_contact_no}}"
                                        name="gcontact">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->address}}" name="address">
                                </div>
                            </div>

                            @endif
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3 text-secondary">
                                    <button class="btn btn-primary d-block w-100" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- Password changechange -->
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('newadd.password') }}">
                            @csrf
                            <input type="hidden" class="form-control" value="{{$item2->email}}" name="email">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Old Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-danger">@error('Old_Password'){{ $message }} @enderror</span>
                                    <input type="text" class="form-control" placeholder="Old Password"
                                        name="Old_Password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                    <input type="text" class="form-control" placeholder="New Password" name="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Comfirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-danger">@error('password_confirmation'){{ $message }}
                                        @enderror</span>
                                    <input type="text" class="form-control" placeholder="Comfirm Password"
                                        name="password_confirmation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3 text-secondary">
                                    <button class="btn btn-primary d-block w-100" type="submit">Change password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</div>
<div class="modal" tabindex="-1" id="changepic">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('Update.Profilepic') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Select the Picture on computer</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="Ppicture">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection