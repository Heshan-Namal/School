@extends('layouts.MasterDashboard')

@section('style')
<!-- add style here -->
@endsection
<!-- content section -->
@section('content')
<div class="container_AssStudent">

    @foreach ($class as $item)

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <h3 class="my-auto text-primary">Grade {{$item->class_name}} details </h3>
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
                            <h6 class="mb-0">Class name</h6>
                        </div>
                        <div class="col-sm-4 text-secondary my-1">
                            <input type="text" class="form-control" value="{{$item->class_name}}" name="class_name">
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
                    <div class="row mb-3">
                        <div class="col-sm-12 text-secondary my-1">
                            <p class="fs-3 text-info">Add subjects for class </p>
                        </div>
                        <form method="POST" action="{{route('edit.class_sub')}}">
                            @csrf
                            <div class="col-sm-3 my-1">
                                <h6 class="mb-0">Subject name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary my-1">
                                <input type="hidden" class="form-control" value="{{$item->id}}" name="class_id">
                                <select id="inputGrade" class="form-select mt-0" aria-label="Default select example"
                                    name="subject_teacher_id">
                                    <option selected>Choose...</option>
                                    @foreach ($classroom as $item3)
                                    <option value="{{$item3->id}}">
                                        {{$item3->sub}}-{{$item3->teacher_id}}-{{$item3->name}}</option>
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
                                    @foreach ($class_sub as $item3)
                                    <tr>
                                        <th scope="row">{{$item3->id}}</th>
                                        <td>{{$item3->sub}}</td>
                                        <td>{{$item3->name}}</td>
                                        <td><a href="" class="btn btn-primary btn-sm">Edit</a></td>
                                        <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                    @endforeach

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
                        <h1>TIME TABLE</h1>
                        <div class="mb-1">
                            <label for="formFile" class="form-label">Import time table</label>

                        </div>
                        <form method="POST" enctype="multipart/form-data" action="{{route('edit.class_sub')}}">
                            {{csrf_field()}}
                            <div class="col-sm-4 text-secondary mb-4">
                                <span class="text-danger">@error('timetable'){{ $message }} @enderror</span>
                                <input class="form-control" type="file" name="select_file">
                            </div>
                            <div class="col-sm-3 text-secondary mb-4">
                                <button class="btn btn-primary d-block w-100" type="submit">Save Changes</button>

                            </div>
                        </form>
                        <table class="table table-bordered">
                            <!--<caption>Timetable</caption>-->
                            <tr>
                                <td align="center" height="50" width="100"><br>
                                    <b>Day/Period</b></br>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>I<br>9:30-10:20</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>II<br>10:20-11:10</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>III<br>11:10-12:00</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>IV<br>12:40-1:30</b>
                                </td>
                                <td rowspan="6" align="center" width="100">
                                    <b>IV<br>12:40-1:30</b><br>
                                    <h2>L<br>U<br>N<br>C<br>H</h2>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>V<br>1:30-2:20</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>VI<br>2:20-3:10</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>VII<br>3:10-4:00</b>
                                </td>
                                <td align="center" height="50" width="100">
                                    <b>VIII<br>3:10-4:00</b>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="50">
                                    <b>Monday</b>
                                </td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">Eng</td>
                                <td align="center" height="50">Che</td>
                                <td align="center" height="50">Mat</td>
                                <td align="center" height="50">SPORTS</td>
                                <td align="center" height="50">Phy</td>

                            </tr>
                            <tr>
                                <td align="center" height="50">
                                    <b>Tuesday</b>
                                </td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">Eng</td>
                                <td align="center" height="50">Che</td>
                                <td align="center" height="50">Mat</td>
                                <td align="center" height="50">SPORTS</td>
                                <td align="center" height="50">Phy</td>
                            </tr>
                            <tr>
                                <td align="center" height="50">
                                    <b>Wednesday</b>
                                </td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">Eng</td>
                                <td align="center" height="50">Che</td>
                                <td align="center" height="50">Mat</td>
                                <td align="center" height="50">SPORTS</td>
                                <td align="center" height="50">Phy</td>
                            </tr>
                            <tr>
                                <td align="center" height="50">
                                    <b>Thursday</b>
                                </td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">Eng</td>
                                <td align="center" height="50">Che</td>
                                <td align="center" height="50">Mat</td>
                                <td align="center" height="50">SPORTS</td>
                                <td align="center" height="50">Phy</td>
                            </tr>
                            <tr>
                                <td align="center" height="50">
                                    <b>Friday</b>
                                </td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">LAB</td>
                                <td align="center" height="50">Eng</td>
                                <td align="center" height="50">Che</td>
                                <td align="center" height="50">Mat</td>
                                <td align="center" height="50">SPORTS</td>
                                <td align="center" height="50">Phy</td>
                            </tr>
                        </table>
                    </div>
                    <!-- End of add Class  -->
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button">Download as pdf</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection