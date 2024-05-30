<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sản phẩm theo danh mục</title>
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

                <div class="content row">
                    <div class="category-root">
                        <div class="category">
                            <a href="#" class="category-title">DANH MỤC SẢN PHẨM</a>
                            <ul class="category-menu">
                                @foreach ($categories as $category)
                                    <li class="menu"><a href="{{route('listProduct.show', ['id' => $category->id])}}">{{$category->name}}</a>
                                        <ul class="submenu">
                                            @foreach ($category->products as $product)
                                                <li><a href="{{route('home.productDetail', $product->id)}}">{{$product->name}}</a></li> 
                                            @endforeach
                                        </ul> 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-favorite">
                            <p class="title">SẢN PHẨM YÊU THÍCH</p>
                            <div class="block-favorite">
                                <img src="{{asset('frontend\assets\img\product\atiso-do-e1562143364678.png')}}" alt="">
                                <div class="name-price">
                                    <a href="#" class="name">Trà atiso đỏ</a>
                                    <p class="price">25,000 Đ</p>
                                </div>
                            </div>
                            <div class="block-favorite">
                                <img src="{{asset('frontend\assets\img\product\atiso-do-e1562143364678.png')}}" alt="">
                                <div class="name-price">
                                    <a href="#" class="name">Trà atiso đỏ</a>
                                    <p class="price">25,000 Đ</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block-right">
                        <div class="body">
                            <p class="title">{{$titleCategory->name}}</p>
                            <div class="many-product">
                                @foreach ($products as $product)
                                    <div class="product">
                                        <div class="image-wrapper">
                                            <a href="{{route('home.productDetail', $product->id)}}"><img src="{{asset('uploads/products/' . $product->image)}}" alt=""></a>
                                            <div class="overlay"></div>
                                        </div>
                                        <a href="{{route('home.productDetail', $product->id)}}" class="name-product">{{$product->name}}</a>
                                        <div class="row" style="align-items: center">
                                                @if($product->sale_price) 
                                                <div class="">
                                                    <p class="price" style="text-decoration: line-through">{{number_format($product->price, 0, '.', '.') . ' đ'}}</p>
                                                    <p class="sale_price">{{number_format($product->sale_price, 0, '.', '.') . ' đ'}}</p>
                                                </div>
                                                @else 
                                                    <p class="price">{{number_format($product->price, 0, '.', '.') . ' đ'}}</p>
                                                @endif

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
        </div>
    </div>
    @include('frontend.footer')
</body>
</html>