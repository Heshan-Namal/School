@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Teacher Registration</header>

        <form class="row g-3" method = "POST" action = "AddTeacher">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="inputName" name="Full_name">
            </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="Email">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="inputGurdianNumber" name="Contact_Number">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="Address">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Teacher</button>
            </div>
        </form>
</div>
@endsection