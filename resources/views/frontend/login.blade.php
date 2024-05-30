<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    @include('frontend.head')
    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
</head>
<body>
    @include('frontend.header')
    <div class="register">
        <div class="register-space"></div>
        <div class="register-form">
            <form action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group row">
                    <a href="">Quên mật khẩu?</a>
                    <p></p>
                    <a href="">Chưa có tài khoản?</a>
                </div>
                <div class="form-group">
                    <button type="submit">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
    @include('frontend.footer')


</body>
</html>