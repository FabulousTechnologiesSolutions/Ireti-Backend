<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.csslinks')
    <title>Login</title>
</head>

<body>
    <section class="logins">
        <div class="container-fluid">
            <div class="row align-items-center p-0 vertical-log">
                <div class="col-md-7 col-6 green-bg h-100 d-sm-block d-none">
                    <div class="d-flex flex-column justify-content-center h-100 position-relative px-lg-5 p-3">
                        <div class="back-img">
                            <img src="{{asset('img/lines.svg')}}" alt="lines">
                        </div>
                        <div>
                            <img src="{{asset('img/Logo_Ireti.svg')}}" alt="Logo_Ireti" class="img-irt">
                        </div>
                        <p class="text-white mt-4">Optimization is growth</p>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 bg-white h-100">
                    <form method="POST" action="{{ route('login') }}" class="h-100">
                        @csrf
                        <div class="flex-log justify-content-center py-4 ">
                            <div class="row">
                                <div class="mb-3 col-lg-8 mx-auto">
                                    <h3 class="text-start fw-bold">Hello Again!</h3>
                                    <p class="text-start">Welcome back</p>
                                </div>
                                <div class="mb-3 col-lg-8 mx-auto">
                                    <div
                                        class="bg-white form-control border focus-none w-100 py-3 ps-4 rounded-pill d-flex gap-2">
                                        <label for=""><img src="{{asset('img/codicon_mail.svg')}}" alt="codicon_mail"></label>
                                        <input id="email" type="email" class="py-0 border-0 focus-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-8 mx-auto">
                                    <div
                                        class="bg-white form-control border focus-none w-100 py-3 ps-4  rounded-pill d-flex gap-2">
                                        <label for=""><img src="{{asset('img/bx_bxs-lock-alt.svg')}}" alt="bx_bxs"></label>
                                        <input id="password" type="password" class="py-0 border-0 focus-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-8 mx-auto">
                                    <div>
                                        <input type="submit" name="" value="Login"
                                            class="green-btn text-white border-0 w-100 rounded-pill py-2 px-sm-5 px-4"
                                            id="">
                                    </div>
                                </div>
                                <p class="mt-2 text-center">Forgot Password</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('Template.footer')
    @include('Template.jslinks')
</body>

</html>