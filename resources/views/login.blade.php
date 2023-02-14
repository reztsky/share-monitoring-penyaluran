<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DBHCHT</title>
    @vite(['resources/js/app.js'])
    <style></style>
</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <h2 class="auth-heading text-center mb-5">Log in DBHCHT</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" method="post" action="{{route('auth')}}">
                            @csrf
                            <div class="username mb-3">
                                <input id="username" name="username" type="text" class="form-control shadow-sm"
                                    placeholder="Username" required="required" />
                                @error('username')
                                <div class="form-text text-danger align-start">{{$message}}</div>
                                @enderror
                            </div>
                            <!--//form-group-->
                            <div class="input-group mb-3">
                                <input id="password" name="password" type="password" class="form-control shadow-sm"
                                    placeholder="Password" required="required" />
                                <span class="input-group-text" id="btn-show-password" data-eye-open=true
                                    style="cursor: pointer"></span>
                                @error('password')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row align-items-top">
                                <div class="col-md-6 col-12 col-sm-6">
                                    <div class="captcha pt-md-2 pt-sm-2 pt-0">
                                        <span>{!! captcha_img('custom') !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload"
                                            id="reload">&#x21bb;</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 col-sm-6">
                                    <div class="form-outline form-white mb-3 mt-1">
                                        <input type="text" id="capthca" name="captcha"
                                            class="form-control form-control shadow-sm" placeholder="Captcha" />
                                        {{-- <label class="form-label" for="Captcha">Captcha</label> --}}
                                    </div>
                                </div>
                            </div>
                            @error('captcha')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember_me" type="checkbox" value="true"
                                            id="RememberPassword" />
                                        <label class="form-check-label" for="RememberPassword">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">
                                    Log In
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--//auth-form-container-->
                </div>
                <!--//auth-body-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder"></div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    {{-- <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                        <div>
                            Portal is a free Bootstrap 5 admin dashboard template. You can
                            download and view the template license
                            <a
                                href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.
                        </div>
                    </div> --}}
                </div>
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->
    </div>
    <!--//row-->
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