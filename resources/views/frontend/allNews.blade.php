<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết sản phẩm</title>
    @include('frontend.head')

    <link rel="stylesheet" href="{{asset('frontend\assets\css\product_detail.css')}}">
</head>
<body>
    @include('frontend.header')
    <div class="service">
        <div class="main-content">
            <div class="body">
                <div class="service-menu">
                    <div class="service-item">
                        <img src="{{asset('frontend\assets\img\product_detail\huongdan - guide.png')}}" alt="">
                        <p>Hướng dẫn Đặt hàng</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('frontend\assets\img\product_detail\save-money.png')}}" alt="">
                        <p>Chính sách đổi điểm</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('frontend\assets\img\product_detail\shipped.png')}}" alt="">
                        <p>Dịch vụ vận chuyển</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('frontend\assets\img\product_detail\free-delivery.png')}}" alt="">
                        <p>Miễn phí vận chuyển</p>
                    </div>
                </div>

                <div class="all-new row">
                    <div class="blockNews-left">
                        <div class="title">Bài viết mới</div>
                        <div class="list-new row">
                            <div class="one-new">
                                <img src="{{asset('frontend\assets\img\product\16-ab09fc1d-ce5d-4e03-baed-b38482260e5d.jpg')}}" alt="">
                                <p class="name">Pudding xoài dâu tây thơm mát ngày hè dịu nhẹ</p>
                                <p class="date-new">13-05-2024</p>
                                <p class="des">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú.</p>
                            </div>
                            <div class="one-new">
                                <img src="{{asset('frontend\assets\img\product\16-ab09fc1d-ce5d-4e03-baed-b38482260e5d.jpg')}}" alt="">
                                <p class="name">Pudding xoài dâu tây thơm mát ngày hè dịu nhẹ</p>
                                <p class="date-new">13-05-2024</p>
                                <p class="des">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú.</p>
                            </div>
                            <div class="one-new">
                                <img src="{{asset('frontend\assets\img\product\16-ab09fc1d-ce5d-4e03-baed-b38482260e5d.jpg')}}" alt="">
                                <p class="name">Pudding xoài dâu tây thơm mát ngày hè dịu nhẹ</p>
                                <p class="date-new">13-05-2024</p>
                                <p class="des">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú.</p>
                            </div>
                            <div class="one-new">
                                <img src="{{asset('frontend\assets\img\product\16-ab09fc1d-ce5d-4e03-baed-b38482260e5d.jpg')}}" alt="">
                                <p class="name">Pudding xoài dâu tây thơm mát ngày hè dịu nhẹ</p>
                                <p class="date-new">13-05-2024</p>
                                <p class="des">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú.</p>
                            </div>
                            <div class="one-new">
                                <img src="{{asset('frontend\assets\img\product\16-ab09fc1d-ce5d-4e03-baed-b38482260e5d.jpg')}}" alt="">
                                <p class="name">Pudding xoài dâu tây thơm mát ngày hè dịu nhẹ</p>
                                <p class="date-new">13-05-2024</p>
                                <p class="des">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú.</p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="blockNews-right">
                        <div class="title">Bài viết hot</div>
                        <div class="list-new-right">

                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        var oneNewElements = document.querySelectorAll(".one-new"); // Chọn tất cả các phần tử có lớp 'one-new'
        for (var i = 0; i < oneNewElements.length; i++) {
            var desElement = oneNewElements[i].querySelector(".des"); // Chọn phần tử con có lớp 'des' bên trong mỗi phần tử có lớp 'one-new'
            if (desElement) { // Kiểm tra xem phần tử con 'des' có tồn tại không
                truncateText(desElement, 100); // Cắt văn bản nếu vượt quá 50 ký tự
            }
        }

        function truncateText(element, maxLength) {
            var text = element.textContent;
            if (text.length > maxLength) {
                element.textContent = text.slice(0, maxLength) + "...";
            }
        }
    </script>
    @include('frontend.footer')
</body>
</html>