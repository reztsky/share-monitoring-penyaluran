<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>
    @if (session('failed_login'))
    <div class="position-relative">
        <div class="toast-container positon-absolute top-0 end-0  me-3 mt-4" >
            <div class="toast shadow-lg border border-info border-1 show text-white bg-danger" style="--bs-bg-opacity:1;">
                <div class="d-flex">
                    <div class="toast-body">{{session('failed_login')}}</div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <section class="vh-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center py-3">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form method="post" action="{{route('auth')}}">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg @error('usename') @enderror" placeholder="Username" />
                                    @error('username')
                                        <div class="form-text text-danger align-start">{{$message}}</div>
                                    @enderror
                                    {{-- <label class="form-label" for="username">Username</label> --}}
                                </div>
                
                                <div class="form-outline form-white mb-3 mt-1">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                    @error('password')
                                        <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                    {{-- <label class="form-label" for="password">Password</label> --}}
                                </div>

                                <div class="row align-items-top">
                                    <div class="col-md-6 col-12 col-sm-6">
                                        <div class="captcha pt-md-2 pt-sm-2 pt-0">
                                            <span>{!! captcha_img('custom') !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">&#x21bb;</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 col-sm-6">
                                        <div class="form-outline form-white mb-3 mt-1">
                                            <input type="text" id="capthca" name="captcha" class="form-control form-control-lg" placeholder="Captcha" />                                            
                                            {{-- <label class="form-label" for="Captcha">Captcha</label> --}}
                                        </div>
                                    </div>
                                </div>
                                @error('captcha')
                                    <div class="form-text text-danger">{{$message}}</div>
                                @enderror

                                <!-- Checkbox -->
                                {{-- <div class="form-check d-flex justify-content-start mb-3">
                                    <input class="form-check-input" name="remember_me" type="checkbox" value="true" id="form1Example3" />
                                    <label class="form-check-label ms-3" for="form1Example3"> Remember Me </label>
                                </div> --}}
                
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: "{{route('captchaReload')}}",
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
    });
</script>
</html>