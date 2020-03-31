<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録 | HearingForm</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
            <img src="{{ url('/img/motocle-logo.png') }}" alt="logo" class="img-responsive mar" style="width:200px">
            <h3 class="text-primary">登録</h3>
            <!-- Notifications -->
            @include('notifications')
            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('register') }}" method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                    <label class="sr-only"> 名前</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="名前"
                           value="{!! old('first_name') !!}" required>
                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                    <label class="sr-only"> 苗字</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="苗字"
                           value="{!! old('last_name') !!}" required>
                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                    <label class="sr-only"> E-メール</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="E-メール"
                           value="{!! old('Email') !!}" required>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                    <label class="sr-only"> パスワード</label>
                    <input type="password" class="form-control" id="Password1" name="password" placeholder="パスワード">
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                    <label class="sr-only"> パスワードを認証</label>
                    <input type="password" class="form-control" id="Password2" name="password_confirm"
                           placeholder="パスワードを認証">
                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('company_name', 'has-error') }}">
                    <label class="sr-only"> 会社名 </label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="会社名"
                           value="{!! old('company_name') !!}" required>
                    {!! $errors->first('company_name', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                    <label class="sr-only">性別</label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio1" value="male"> 男性
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio2" value="female"> 女性
                    </label>
                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="subscribed" >  <a href="#">私は利用規約に同意します。</a>
                    </label>
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="サインアップ" name="submit">
                すでにアカウントをお持ちですか？ <a href="{{ route('login') }}"> サインイン</a>
            </form>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<!--global js end-->
<script>
    $(document).ready(function(){
        $("input[type='checkbox'],input[type='radio']").iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    });
</script>
</body>
</html>
