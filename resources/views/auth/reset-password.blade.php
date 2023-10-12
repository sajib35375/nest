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
                <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                    <div class="row">
                        <div class="heading_s1">
                            <img class="border-radius-15" src="{{ URL::to('frontend/assets/imgs/page/reset_password.svg') }}" alt="" />
                            <h2 class="mb-15 mt-15">Set new password</h2>
                            <p class="mb-30">Please create a new password that you don’t use on any other site.</p>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-group">
                                            <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Email *" />
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password *" />
                                        </div>
                                        <div class="form-group">
                                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm you password *" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Reset password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pl-50">
                            <h6 class="mb-15">Password must:</h6>
                            <p>Be 8 characters</p>
                            <p>Include at least tow of the following:</p>
                            <ol class="list-insider">
                                <li>An uppercase character</li>
                                <li>A lowercase character</li>
                                <li>A number</li>
                                <li>A special character</li>
                            </ol>
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
