@extends('layouts.auth')

@section('content')
       <!-- Start Login Area -->
       <section class="login-area">
            <div class="row m-0">
               
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        <!--<img src="/curiouskidz.png"  height="200" width="200"  alt="image">-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href="/"><img src="/curiouskidz.png" height="160" width="160" alt="image"></a>
                                    


                                    <h3>Open up your CuriousKidz Account</h3>
                                    <p>Already signed up? <a href="/login">Log in</a></p>
                                        </div>




                                    <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="Enter Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                        </div>


                                       

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Your email address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                        </div>

                                        <div class="form-group">
                                           <select class="form-control" name="roles">
                                                <option selected>Select Your Role</option>
                                                <option value="student">Student</option>
                                                <option value="parent">Parent</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="Create a password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        

                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                          
                                        </div>

                                       
                                        @if(config('settings.reCaptchStatus'))
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4">
                                    <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                                </div>
                            </div>
                        @endif

                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                      

                                        <div class="connect-with-social">
                                            
                                            <a class="btn btn-danger" href="{{ url('auth/google') }}" provider="google"><i class="fab fa-google"></i> Sign up using Google</a>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->


@endsection


