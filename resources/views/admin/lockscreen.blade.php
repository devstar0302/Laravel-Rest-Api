<!DOCTYPE html>
<html>

<head>
    {{--<title>{{ _t('Lock Screen', [], $_SESSION['lang']) }} | {{ _t('FINDMIIN', [], $_SESSION['lang']) }}</title>--}}
    <title>FINDMIIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/lockscreen.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fort.js/css/fort.css') }}" />
    <!-- end of page level css -->
</head>

<body>
    <div class="top">
        <div class="colors"></div>
    </div>
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <div>
                @if($user->pic)
                    <img class="img-responsive img-circle" src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="profile pic">
                @else
                    <img class="img-responsive img-circle" src="http://placehold.it/100x100" alt="profile pic">
                @endif
            </div>
            <div class="form-box">
                <form method="POST" name="screen">
                    <div class="form">
                        <p class="form-control-static">{{ _t('Administrator', [], $_SESSION['lang']) }}</p>
                            <input type="password" name="user" class="form-control" placeholder="Password">
                        <button class="btn btn-info btn-block login" id="index" type="submit">{{ _t('GO', [], $_SESSION['lang']) }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/holder.js') }}"></script>
    <!-- end of global js -->
    <!-- beginning of page level js-->
    <script src="{{ asset('assets/vendors/fort.js/js/fort.js') }}"></script>
    <script src="{{ asset('assets/js/pages/lockscreen.js') }}"></script>
    <script>Fort.gradient();</script>
    <!-- end of page level js-->
</body>
</html>
