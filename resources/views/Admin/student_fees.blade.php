@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>View Submited Facility Fees </header>
        <form action="{{route('view.payments')}}" method="POST" class="row g-3">@csrf
        <div class="row g-3 mt-2 mb-2">
            <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Select grade</label>
            <select id="inputGrade" class="form-select mt-0" aria-label="Default select example" name="id">
                <option selected>Choose...</option>
                @foreach($grade as $item3)
                    <option value="{{ $item3->id }}">{{ $item3->grade_name }}</option>
                @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center col-md-2">
                <button type="submit" class="btn btn-primary">View</button>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/s_a2.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                All Students
                                <p>{{$stdnum}}</p>
                            </p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>

                <div class="col-3">
                    <div class="sub-card">
                        <div class="row g-0">
                            <div class="col-md-4 mt-3">
                              <img
                                src="{{asset('assets/front/images/ass/s_a2.png')}}"
                                alt="Trendy Pants and Shoes"
                                class="img-fluid rounded-start d-flex mx-2"
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <p class="card-text">
                                    All Submited Students
                                    <p>{{$sub}}</p>
                                </p>
                              </div>
                            </div>
                          </div>

                    </div>
                    </div>
        </div>
    </form>
    <div class="row">
        <header class ="mb-3">Student Submitted Fees List</header>
        <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            View payments
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Addmission No</th>
                                <th>Name</th>
                                <th>Class Name</th>
                                <th>Proof</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stdfees as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->admission_no }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td><a class="Link" href="http://127.0.0.1:8000/fee-proof/{{$item->proof}}">{{ $item->proof }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
            </table>
            </div>
            </div>
        </div>

    </div>
</div>

@endsection



