@extends('layouts.MasterDashboard')

@section('style')
<!-- add style here -->
@endsection
<!-- content section -->
@section('content')
<div class="container_AssStudent">
    @foreach ($gradeName as $item)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">

                            <h3 class="my-auto text-primary">Grade {{$item->grade_name}} details </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Edit details -->
                    <div class="row mb-3">
                        <div class="col-sm-12 text-secondary ">
                            <p class="fs-3 text-info">Edit details </p>
                        </div>
                        <div class="col-sm-2 my-1">
                            <h6 class="mb-0">Grade name</h6>
                        </div>
                        <div class="col-sm-4 text-secondary my-1">
                            <input type="text" class="form-control" value="{{$item->grade_name}}">
                        </div>
                        <div class="col-sm-3 text-secondary my-1">
                            <input type="button" class="btn btn-primary px-4" value="Save Changes">
                        </div>
                        <div class="col-sm-3 text-secondary text-center">
                            <img src="{{asset('assets/front/images/grade/image1.jpg')}}" class="rounded float-start "
                                alt="..." style="width:200px;height:200px">
                        </div>
                    </div>
                    <!-- End of edit details -->
                    <!-- Add Subjects  -->
                    <form method="POST" action="{{route('add.Subject')}}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 text-secondary my-1">
                                <p class="fs-3 text-info">Add subjects </p>
                            </div>
                            <div class="col-sm-3 my-1">
                                <h6 class="mb-0">Subject name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary my-1">
                                <span class="text-danger">@error('subject_name'){{ $message }} @enderror</span>
                                <input type="text" class="form-control" placeholder="Subject name" name="subject_name">
                                <input type="hidden" class="form-control" value="{{$item->id}}" name="grade_id">
                            </div>
                            <div class="col-sm-3 my-1">
                                <h6 class="mb-0">Subject teacher name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary my-1">
                                <select id="inputGrade" class="form-select mt-0" aria-label="Default select example"
                                    name="teacher_id">
                                    <option selected>Choose...</option>
                                    @foreach ($teacher as $item2)
                                    <option value="{{$item2->id}}">{{$item2->id}}-{{$item2->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 text-secondary my-1">
                                <input type="submit" class="btn btn-primary px-4" value="Add ">
                            </div>
                    </form>
                    <div class="col-sm-12 text-secondary text-center mt-4">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject name</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Maths</td>
                                    <td>Nimali RAthnayake</td>
                                    <td><a href="" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Science</td>
                                    <td>Nimali RAthnayake</td>
                                    <td><a href="" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Maths</td>
                                    <td>Muditha Chinthaka</td>
                                    <td><a href="" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End of add Subjects  -->
                <!-- Add Classes  -->
                <div class="row mb-3">
                    <div class="col-sm-12 text-secondary my-1">
                        <p class="fs-3 text-info">Add classes </p>
                    </div>
                    <div class="col-sm-3 my-1">
                        <h6 class="mb-0">Class name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary my-1">
                        <input type="text" class="form-control" value="Science">
                    </div>
                    <div class="col-sm-3 my-1">
                        <h6 class="mb-0">Class teacher name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary my-1">
                        <select id="inputGrade" class="form-select mt-0" aria-label="Default select example"
                            name="teacher_id">
                            <option selected>Choose...</option>

                            <option value="1">1-Nimali RAthnayake</option>
                            <option value="2">2-Nimali RAthnayake</option>
                            <option value="3">3-Muditha Chinthaka</option>

                        </select>
                    </div>
                    <div class="col-sm-6 text-secondary my-1">
                        <input type="button" class="btn btn-primary px-4" value="Add ">
                    </div>
                    <div class="col-sm-12 text-secondary text-center mt-4">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Class name</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Class A</td>
                                    <td>Nimali RAthnayake</td>
                                    <td><a href="" class="btn btn-primary btn-sm">View</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Class B</td>
                                    <td>Nimali RAthnayake</td>
                                    <td><a href="" class="btn btn-primary btn-sm">View</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Class C</td>
                                    <td>Muditha Chinthaka</td>
                                    <td><a href="" class="btn btn-primary btn-sm">View</a></td>
                                    <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End of add Class  -->
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection