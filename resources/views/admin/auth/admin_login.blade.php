<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        <link href="{{ asset('backend') }}/assets/css/main.css?v=1.1" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <main>
            <section class="content-main">
                <div class="card mx-auto card-login mt-80">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sign in</h4>
                        <x-jet-validation-errors class="mb-4 text-danger" />
                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="current-password" />
                            </div>
                            <!-- form-group// -->
                            <div class="mb-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="float-end font-sm text-muted">Forgot password?</a>
                                @endif
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" />
                                    <span class="form-check-label">Remember</span>
                                </label>
                            </div>
                            <!-- form-group form-check .// -->
                            <div class="mb-4 text-center">
                                <button type="submit" class="btn btn-primary w-100 d-block">Login</button>
                            </div>
                            <!-- form-group// -->
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <script src="{{ asset('backend') }}/assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="{{ asset('backend') }}/assets/js/main.js?v=1.1" type="text/javascript"></script>
    </body>
</html>
