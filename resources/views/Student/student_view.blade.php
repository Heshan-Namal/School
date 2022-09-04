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
                                <h4{>{{$item->full_name}}</h4><span class="badge bg-success">Rank #1</span>
                                    <p class="text-secondary mb-1">Grade 1 Class A</p>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#changepic">Change Picture</button>
                                    <!-- <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                        <hr class="my-4">
                        <p class="h3 text-primary">Comments </p>
                        <hr class="my-4">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Heshan Namal (Admin)
                                        @if(TRUE)
                                        <span class="badge rounded-pill bg-danger">Bad</span>
                                        @endif
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
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Heshan Namal (Admin)
                                        @if(FALSE)
                                        <span class="badge rounded-pill bg-danger">Bad</span>
                                        @else
                                        <span class="badge rounded-pill bg-success">Good</span>
                                        @endif
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
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- Bio data change -->

                <div class="card">
                    <div class="card-body">

                        @csrf

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
                                <input type="text" class="form-control" value="{{$item->guardian_name}}" name="gname">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
</div>
@endsection