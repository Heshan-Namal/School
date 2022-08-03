@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Student Registration</header>

        <form class="row g-3">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Admissition Number </label>
                <input type="text" class="form-control" id="inputAddno">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="inputName">
            </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="inputDob">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Grade</label>
                <select id="inputGrade" class="form-select mt-0" aria-label="Default select example">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Class</label>
                <select id="inputClass" class="form-select mt-0" aria-label="Default select example">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Name</label>
                <input type="text" class="form-control" id="inputGurdianName">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Email</label>
                <input type="email" class="form-control" id="inputGurdianEmail">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Contact Number</label>
                <input type="text" class="form-control" id="inputGurdianNumber">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
</div>
@endsection