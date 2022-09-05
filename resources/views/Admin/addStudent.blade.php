@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
    <header>Student Registration</header>

    <form class="row g-3" method="POST" action="{{route('admin.addstudent')}}">
        @csrf

        <div class="col-md-4">

            <label for="inputEmail4" class="form-label">Admissition Number </label>
            <input type="text" class="form-control" id="inputAddno" name="admission_no" placeholder="0000">
            <span class="text-danger">@error('admission_no'){{ $message }} @enderror</span>
        </div>
        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="inputName" name="Full_name">
            <span class="text-danger">@error('Full_name'){{ $message }} @enderror</span>
        </div>

        <div class="col-md-4">

            <label for="inputPassword4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="Email">
            <span class="text-danger">@error('Email'){{ $message }} @enderror</span>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="address">
            <span class="text-danger">@error('address'){{ $message }} @enderror</span>
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="inputDob" name="dob">
            <span class="text-danger">@error('dob'){{ $message }} @enderror</span>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Class</label>

            <select class="form-select mt-0 classadd" aria-label="Default select example" id="classroom"
                name="class_id">
                <option selected>Choose...</option>
                <span class="text-danger">@error('class_id'){{ $message }} @enderror</span>
                @foreach ($classroom as $item)
                <option value="{{$item->id}}">{{$item->class_name}}</option>

                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Guardian Name</label>
            <input type="text" class="form-control" id="inputGurdianName" name="guardian_name">
            <span class="text-danger">@error('guardian_name'){{ $message }} @enderror</span>
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Guardian Email</label>
            <input type="email" class="form-control" id="inputGurdianEmail" name="guardian_email">
            <span class="text-danger">@error('guardian_email'){{ $message }} @enderror</span>
        </div>
        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Guardian Contact Number</label>
            <input type="text" class="form-control" id="inputGurdianNumber" name="guardian_contact_no">
            <span class="text-danger">@error('guardian_contact_no'){{ $message }} @enderror</span>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add Student</button>
        </div>
    </form>
    <div class="row">
        <header class="mb-3">Teacher List</header>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>dob</th>
                    <th>address</th>
                    <th>guardian_name</th>
                    <th>Grade id</th>
                    <th>Class id</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $item)

                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->dob }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->guardian_name }}</td>
                    <td>{{ $item->grade_id }}</td>
                    <td>{{ $item->class_id }}</td>

                    <td>
                        <a href="{{route('user.edit',[$item->user_id])}}" class="btn btn-primary btn-sm">View</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#grade').change(function() {
        var id = $(this).val();
        alert(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //call class on grade selected
        $.ajax({
            dataType: 'json',
            url: "/getClass/" + id,
            type: "GET",
            success: function(data) {
                console.log(data);
                $('#classroom').html(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>
@endsection