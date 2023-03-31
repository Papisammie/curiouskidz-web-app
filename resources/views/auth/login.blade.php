@extends('layouts.auth')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


        @if (session('error'))
           <script type="text/javascript">
                Swal.fire(
                'Error!',
                '{{ session('error') }}',
                'error'
                )
            </script>
        @endif



      <!-- Start Login Area -->
      <section class="login-area">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        <!-- <img src="/curiouskidz.png"  height="200" width="200"  alt="image"> -->
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href="/"><img src="/curiouskidz.png" height="200" width="200" alt="image"></a>
                                    

                                    <h3>Welcome back</h3>
                                    <p>New to CuriousKidz? <a href="/register">Sign up</a></p>
                                    </div>

                                      

                                   

                                   

                                    <form method="POST" action="{{ url('login') }}">
                                        @csrf
                                        <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                            <input type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Your email address" class="form-control">
                                            
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                            <input type="password" name="password" placeholder="Your password" class="form-control">
                                            
                                        </div>

                                       

                                        <button type="submit" class="btn btn-primary">Login</button>
                                        
                                        <div class="forgot-password">
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>

                                        
                                        </form>
                                        <div class="connect-with-social">
                                        
                                        <form method="POST" action="{{ url('loginAsGuest') }}">
                                            <input type="hidden" name="roles" value="guest">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary"><span>Login as Guest</span>
                                            </button>
                                        </form><br>

                                        
                                        <a class="btn btn-danger col-lg-12" href="{{ url('auth/google') }}" provider="google"><i class="fab fa-google"></i> Sign in using Google</a>
                                     </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->



@endsection
