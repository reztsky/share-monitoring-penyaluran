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
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                        <span class="input-group-text" id="btn-show-password" data-eye-open=true style="cursor: pointer"></span>
                                    </div>
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
    var eyeSlash=`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
        </svg>`
    var eye=`<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>`
    $('#btn-show-password').html(eye)

    $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: "{{route('captchaReload')}}",
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
    });
    $('#btn-show-password').on('click',function(e){
        
        let isShowPass=$(this).attr('data-eye-open') == "true" ? true : false
        if(isShowPass){
            $(this).html(eyeSlash)
            $(this).attr('data-eye-open',false)
            $('#password').attr('type','text')
            return 
        }

        $(this).html(eye)
        $(this).attr('data-eye-open',true)
        $('#password').attr('type','password')
        return
        
    })
</script>
</html>