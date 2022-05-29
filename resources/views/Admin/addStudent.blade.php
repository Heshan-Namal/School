@extends('layouts.dashboard')
@extends('layouts.navigation')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Registration</header>

        <form action="#" class="{{ in_array(Route::currentRouteName(), ['addstd', 'marks.year_selector', 'pins.enter']) ? 'active' : '' }}">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Student Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Grade</label>
                            <select required>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Class</label>
                            <select required>
                                <option>Class A</option>
                                <option>Class B</option>
                                <option>Class C</option>
                            </select>
                        </div>
                        <div class="input-field">
                        <label>Password</label>
                            <select required>
                                <option disabled selected>Default Password</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Clear</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                 
            </div>


            
        </form>
    </div>
    @endsection