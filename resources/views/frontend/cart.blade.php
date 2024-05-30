<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    @include('frontend.head')



    <link rel="stylesheet" href="{{asset('frontend\assets\css\user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\errormessage.css')}}">
    <link rel="stylesheet" href="{{asset('frontend\assets\css\cart.css')}}">
</head>
<body>
    @include('frontend.header')
        <div class="main-content cart">
            <h2>Giỏ hàng của bạn</h2>
            <table class="table table-hover table-cart">
                <thead>
                    <tr>
                        <th class="col-image">Ảnh</th>
                        <th class="col-product">Sản phẩm</th>
                        <th class="col-quantity">Số lượng</th>
                        <th class="col-price">Giá</th>
                        <th class="col-total">Thành tiền</th>
                        <th class="col-action"></th>
                    </tr>
                </thead>
                <tbody>
                    @auth
                        @if($carts && $carts->isNotEmpty())
                            @foreach ($carts as $cart)
                            <tr>
                                <td class="col-image"><img src="{{asset('uploads/products/' . $cart->product->image )}}" alt="Product Image" class="product-img-cart"></td>
                                <td class="col-product"><a href="{{route('home.productDetail', $cart->product->id)}}">{{$cart->product->name}}</a></td>
                                <td class="col-quantity">
                                    <form action="{{route('cart.update', $cart->product_id)}}" method="get" class="update-quantity-form">
                                        <input type="number" value="{{$cart->quantity}}" name="quantity" class="quantity-input" min="1">
                                        <button class="btn-update-quantity"><i class="fa-solid fa-floppy-disk"></i></button>
                                    </form>
                                </td>
                                <td class="col-price">{{number_format($cart->price, 0, '.', '.') . ' đ' }}</td>
                                <td class="col-total">{{number_format($cart->price * $cart->quantity, 0, '.', '.') . ' đ'}}</td>
                                <td class="col-action">
                                    <a href="{{route('cart.delete', $cart->product_id)}}" onclick="confirm('Bạn có chắc muốn xóa không ?')" class="btn-delete-cart"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="all-price">
                                <td class="none-boder-right"></td>
                                <td class="none-boder"></td>
                                <td class="none-boder"></td>
                                <td class="title-price">Tổng tiền</td>
                                <td class="all-price-cart">{{ number_format($carts->sum(function($cart) { return $cart->price * $cart->quantity; }), 0, '.', '.') . ' đ' }}</td>
                                <td></td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" style="color: red">Bạn chưa có sản phẩm nào trong giỏ hàng.</td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td colspan="6" style="color: red">Vui lòng đăng nhập để xem giỏ hàng của bạn.</td>
                        </tr>
                    @endauth
                </tbody>
            </table>
            <div class="btn-cart">
                <div class="btn-cart-left"><a href="{{route('home.index')}}"><i class="fa-solid fa-arrow-left-long"></i> Tiếp tục mua hàng</a></div>
                <div class="btn-cart-right"><a href="{{route('checkout.index')}}"><i class="fa-solid fa-right-to-bracket"></i> Thanh toán</a></div>
            </div>
        </div>
    @include('frontend.footer')
</body>
</html>