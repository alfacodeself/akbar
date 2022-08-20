<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.styles')

    <title>Sign In</title>
</head>

<body>

    <div class="login-bg-overlay au-sign-in-basic"></div>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                    <div class="card radius-10">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4>Sign In</h4>
                                <p>Sign In to your account</p>
                            </div>
                            <form class="form-body row g-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="inputEmail"
                                        placeholder="Your Username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                        placeholder="Your password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckRemember" name="remember">
                                        <label class="form-check-label" for="flexSwitchCheckRemember">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="my-5">
            <div class="container">
                <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
                    <a href="javascript:;">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-github"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </div>
                <div class="text-center">
                    <p class="my-4">Design By <a href="">Alfa Code</a>.</p>
                </div>
            </div>
        </footer>
    </div>
    @include('layouts.scripts')
    @include('partials.alert')
</body>

</html>
