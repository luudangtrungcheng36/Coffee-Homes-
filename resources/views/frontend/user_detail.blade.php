<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khách hàng</title>
    @include('frontend.head')
    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\errormessage.css')}}">
    <style>
        .image-preview {
            margin-top: 10px;
            text-align: center;
        }

        .image-preview img {
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #ddd;
            border-radius: 4px;
            object-fit: cover;
        }

        .image-upload {
            display: flex;
            align-items: center;
        }

        .image-upload input[type="file"] {
            /* flex-grow: 1; */
            margin-right: 20px;
        }

        .image-preview {
            margin-left: 15px;
        }

        .image-preview img {
            width: 100px;
            height: 100px;
            border: 1px solid #ddd;
            border-radius: 50%;
            object-fit: cover;
        }


    </style>
</head>
<body>
    @include('frontend.header')
    <div class="register">
        <div class="register-space"></div>
        <div class="register-form">
            <form action="{{route('user.update', $account->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-groupf">
                    <label for="image">Chọn ảnh avatar:</label>
                    <div class="image-upload">
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                        <div class="image-preview">
                            <img id="image-preview" src="{{asset('uploads/avatars/' . $account->avatar)}}" alt="Image Preview">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Họ và tên</label>
                    <input type="text" id="username" name="username" required value="{{$account->name}}">
                    @error('username')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required readonly value="{{$account->email}}">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" id="phonenumber" name="phonenumber" required value="@if($account->phonenumber){{$account->phonenumber}}@endif">
                    @error('phonenumber')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" required value="@if($account->address){{$account->address}}@endif">
                    @error('address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit">Cập nhập</button>
                </div>
            </form>
        </div>
    </div>
    @include('frontend.footer')
    <script>
        $('.description').summernote({
            height: 250
        });
    
        // function showImage(input) {
        //         if (input.files && input.files[0]) {
        //             var reader = new FileReader();
    
        //             reader.onload = function (e) {
        //                 $('#img_show')
        //                     .attr('src', e.target.result)
        //                     // .width(150);
        //             };
    
        //             reader.readAsDataURL(input.files[0]);
        //         }
        //     }
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>