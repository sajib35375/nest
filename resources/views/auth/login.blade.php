@extends('frontend.front_master')

@section('frontend')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-4 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{ URL::to('frontend/assets/imgs/page/login-2.png') }}" alt="" />
                        </div>



                        <div class="col-lg-4 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="{{ route('register') }}">Create here</a></p>
                                    </div>
                                    <x-jet-validation-errors class="mb-4 text-danger" />
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" required="" name="email" placeholder="Enter Your Email *" />
                                        </div>

                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Your password *" required autocomplete="current-password" />
                                        </div>

                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me" value="" />
                                                    <label class="form-check-label" for="remember_me"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="{{ url('/login/facebook') }}" class="social-login facebook-login">
                                    <img src="{{ URL::to('frontend/') }}/assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="{{ url('/login/google') }}" class="social-login google-login">
                                    <img src="{{ URL::to('frontend/') }}/assets/imgs/theme/icons/logo-google.svg" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="{{ url('/login/github') }}" class="social-login apple-login">
                                    <img src="{{ URL::to('frontend/') }}/assets/imgs/theme/icons/github.png" alt="" />
                                    <span>Continue with Github</span>
                                </a>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="main">
    @include('frontend.layout.subscribers')
    @include('frontend.layout.featured_section')
    <!--End 4 columns-->
    @include('frontend.layout.footer')
</footer>
@endsection
