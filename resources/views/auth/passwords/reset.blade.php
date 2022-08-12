@extends('layouts.master')

@section('content')

<main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="container">
                <div class="heading">
                    <h2>{{ __('Reset Password') }}</h2>
                </div>
            </div>
            <section class="login-clean">
                <form method="post" action="{{ route('change.password') }}">
            @if(Session::get('success'))
               <div class="alert alert-success">
                  {{ Session::get('success') }}
               </div>
            @endif	
			@if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif
  
           @csrf
                    <h2 class="visually-hidden">Login Form</h2>
                    <input type="hidden" name="token2"  placeholder="{{$token}}" value="{{$token}}">
                    <div class="mb-3"><input class="form-control" type="email" name="email"  placeholder="{{$email}}" value="{{$email}}"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="New Password"></div>
                    <div class="mb-3"><input class="form-control" type="password" name="Confirm_password" placeholder="Confirm Password"></div>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Reset password</button></div><a class="forgot" href="{{ route('login') }}">Need to login ? click here</a>
                </form>
            </section>
        </section>
</main>



@endsection
