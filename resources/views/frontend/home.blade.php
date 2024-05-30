<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee Homes</title>
    @include('frontend.head')
</head>
<body>
    @include('frontend.header')

    <div class="top-banner">
        <div class="body">
            <img
            src="./frontend/assets/img/bigbanner/bigBanner1.png"
            alt=""
            class="big-banner"
        />
        </div>
    </div>
    
    <div class="bot-banner">
      <div class="main-content">
        <div class="body">
            <img src="./frontend/assets/img/tinybanner/tinybanner1.png" alt="" class="tiny-banner">
            <div class="des">
                <img src="{{asset('uploads\banner\morning-coffee-typography.png')}}" alt="">
                <p>"Đi cà phê" từ lâu không đơn thuần chỉ là uống một tách cà phê mà còn là dịp gặp mặt và trò chuyện cùng bạn bè. Tại The Coffee Homes, chúng tôi trân trọng và đề cao giá trị kết nối giữa con người và trải nghiệm của khách hàng. Chúng tôi tin tưởng mạnh mẽ rằng thức uống với chất lượng tốt nhất được phục vụ trong không gian thân thiện bởi những nhân viên tận tâm tại The Coffee Homes sẽ mang lại những niềm vui bạn có thể chia sẻ cùng bạn bè và gia đình. The Coffee Homes luôn luôn chào đón bạn.</p>
            </div>
        </div>
      </div>
    </div>

    <div class="sell-product">
        <div class="sale-product roboto-bold">
            <div class="main-content">
                <div class="body">
                    <div class="title">
                        <h2>Thức uống khuyến mãi </h2>
                    </div>
                    <div class="btns">
                        <div class="btn-left btn-left1"><i class='bx bx-chevron-left'></i></div>
                        <div class="btn-right btn-right1"><i class='bx bx-chevron-right' ></i></div>
                    </div>
                    <div class="list-product list-product1">
                        @foreach ($saleProducts as $product)
                        <div class="imgProduct imgProduct1">
                            <img src="{{asset('uploads/products/' . $product->image)}}" alt="" class="img">
                            <a href="{{route('home.productDetail', $product->id)}}" class="name-product">{{$product->name}}</a>
                            <div class="desProduct">
                                <div class="price-block">
                                    <p class="sale-price" style="text-decoration: line-through">{{number_format($product->sale_price, 0, '.', '.') . ' đ'}}</p>
                                    <p class="price">{{number_format($product->price, 0, '.', '.') . ' đ'}}</p>
                                </div>
                                @guest
                                    <a href="" onclick="alert('Vui lòng đăng nhập để thực hiện chức năng này')" class="button-buy"><i class='bx bxs-cart-alt'></i> Thêm vào giỏ </a>
                                @else
                                <a href="{{route('cart.create', ['id' => $product->id])}}" class="button-buy"><i class='bx bxs-cart-alt'></i> Thêm vào giỏ </a>

                                @endguest
                            </div>
                        </div>
                        @endforeach                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sell-product">
        <div class="sale-product roboto-bold">
            <div class="main-content">
                <div class="body">
                    <div class="title">
                        <h2>Thức uống hot </h2>
                    </div>
                    <div class="btns">
                        <div class="btn-left btn-left2"><i class='bx bx-chevron-left'></i></div>
                        <div class="btn-right btn-right2"><i class='bx bx-chevron-right' ></i></div>
                    </div>
                    <div class="list-product list-product2">
                        @foreach ($hotProducts as $hotProduct)
                        <div class="imgProduct imgProduct2">
                            <img src="{{asset('uploads/products/' . $hotProduct->image)}}" alt="" class="img">
                            <a href="{{route('home.productDetail', $hotProduct->id)}}" class="name-product">{{$hotProduct->name}}</a>
                            <div class="desProduct">
                                <div class="price-block">
                                    @if($hotProduct->sale_price)
                                    <p class="sale-price" style="text-decoration: line-through">{{number_format($product->sale_price, 0, '.', '.') . ' đ'}}</p>
                                    @endif
                                    <p class="price">{{number_format($product->price, 0, '.', '.') . ' đ'}}</p>
                                </div>
                                @guest
                                    <a href="" onclick="alert('Vui lòng đăng nhập để thực hiện chức năng này')" class="button-buy"><i class='bx bxs-cart-alt'></i> Thêm vào giỏ </a>
                                @else
                                <a href="{{route('cart.create', ['id' => $product->id])}}" class="button-buy"><i class='bx bxs-cart-alt'></i> Thêm vào giỏ </a>

                                @endguest
                            </div>
                        </div>                     
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.footer')    
</body>
</html>