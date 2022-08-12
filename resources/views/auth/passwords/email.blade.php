@extends('layouts.master')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="container">
                <div class="heading">
                    <h2>{{ __('Reset Password') }}</h2>
                </div>
            </div>
            <section class="login-clean">
                <form method="post" action="{{ route('password_reset') }}">
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
                    <p >Enter your email address and we will send you a link to reset your password</p>
                    
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}"><span class="text-danger">@error('email'){{ $message }} @enderror</span></div>
                    
                    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Send reset password link</button></div><a class="forgot" href="{{ route('login') }}">Need to login ? click here</a>
                </form>
            </section>
        </section>
</main>






@endsection
