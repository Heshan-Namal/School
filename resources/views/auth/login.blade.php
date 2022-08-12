@extends('layouts.master')
@section('content')

<main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="container">
                <div class="heading">
                    <h2>log in</h2>
                </div>
            </div>
            <section class="login-clean">
                <form method="post" action="{{ route('login') }}">
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
                    
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}"><span class="text-danger">@error('email'){{ $message }} @enderror</span></div>
                    <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"><span class="text-danger">@error('password'){{ $message }} @enderror</span></div>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Log In</button></div><a class="forgot" href="{{route('passwords.reset.link')}}">Forgot your password?</a>
                </form>
            </section>
        </section>
</main>





@endsection
