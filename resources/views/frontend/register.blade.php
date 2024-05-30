<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    @include('frontend.head')
    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\errormessage.css')}}">
</head>
<body>
    @include('frontend.header')
    <div class="register">
        <div class="register-space"></div>
        <div class="register-form">
            <form action="{{route('user.index')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Họ và tên</label>
                    <input type="text" id="username" name="username" required>
                    @error('username')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                    @error('confirm-password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
    @include('frontend.footer')
</body>
</html>