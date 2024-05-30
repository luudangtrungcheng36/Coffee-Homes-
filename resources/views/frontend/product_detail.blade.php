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

                    <div class="product-about column">
                        <div class="buy-product row">
                            <img src="{{asset('uploads/products/' . $oneProduct->image)}}" class="img-productDetail-custom" alt="">
                            <div class="name-price">
                                <p class="name">{{$oneProduct->name}}</p>
                                    @if($oneProduct->sale_price) 
                                        <div class="price row space-between">
                                            <p style="font-weight: 700">Giá:</p>
                                            <p class="price-child">{{number_format($oneProduct->sale_price, 0, '.', '.') . ' đ'}}</p>
                                        </div>
                                        
                                        <div class="sale-price row space-between">
                                            <p style="font-weight: 700">Giá cũ :</p>
                                            <p class="sale-price-child" style="text-decoration: line-through">{{number_format($oneProduct->price, 0, '.', '.') . ' đ'}}</p>
                                        </div>
                                    @else 
                                        <div class="price row space-between mt-40">
                                            <p style="font-weight: 700">Giá:</p>
                                            <p class="price-child">{{number_format($oneProduct->price, 0, '.', '.') . ' đ'}}</p>
                                        </div>
                                    @endif


                            </div>
                            <div class="action-buy">
                                <p class="status">Còn hàng</p>
                                <p class="quantity">Số lượng:</p>
                                <div class="quantity-container">
                                    <button id="decrease" onclick="changeQuantity(-1)">-</button>
                                    <input type="number" id="quantity" value="1" min="1">
                                    <button id="increase" onclick="changeQuantity(1)">+</button>
                                </div>
                                <form action="{{route('cart.create', ['id' => $oneProduct->id])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" id="form-quantity" value="1">
                                    <button type="submit" class="btn-buy">Đặt hàng</button>
                                </form>
                            </div>

                        </div>

                        <div class="product-detail">
                            <h3 class="des">Mô tả sản phẩm</h3>
                            <div>
                                {!!$oneProduct->description!!}
                            </div>
                        </div>
                        @if(auth()->check())
                        <form action="{{route('user.comment', ['account_id' => $account->id, 'product_id' => $oneProduct->id])}}" method="POST">
                            @csrf
                            <div class="product-comment">
                                <h3>Đánh giá sản phẩm</h3>
                                <div class="star-rating">
                                    <label for="rating">Chọn số sao:</label>
                                    <select name="number_stars" id="rating">                                    
                                        <option value="1">&#9733;</option>
                                        <option value="2">&#9733;&#9733;</option>
                                        <option value="3">&#9733;&#9733;&#9733;</option>
                                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                        <option value="5" selected>&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                    </select>
                                </div>
                                <textarea name="content" class="comment" placeholder="Viết bình luận của bạn ở đây..."></textarea>
                                <button class="submit-comment">Gửi</button>
                            </div>
                        </form>
                        @endif
                        <div class="review-container">
                            @foreach ($comments as $comment)
                            <div class="review">
                                <div class="avatar">
                                    <img src="{{asset('uploads/avatars/' . $comment->account->avatar)}}" alt="User Avatar">
                                </div>
                                <div class="review-content">
                                    <div class="review-header">
                                        <span class="username">{{$comment->account->name}}</span>
                                        <div class="stars">
                                            @if($comment->number_stars == 5) 
                                            &#9733;&#9733;&#9733;&#9733;&#9733;
                                            @elseif($comment->number_stars == 4)
                                            &#9733;&#9733;&#9733;&#9733;&#9734;
                                            @elseif($comment->number_stars == 3)
                                            &#9733;&#9733;&#9733;&#9734;&#9734;
                                            @elseif($comment->number_stars == 2)
                                            &#9733;&#9733;&#9734;&#9734;&#9734;
                                            @elseif($comment->number_stars == 1)
                                            &#9733;&#9734;&#9734;&#9734;&#9734;
                                            @endif
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        <p>{{$comment->content}}</p>
                                    </div>
                                </div>
                            </div>           
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.footer')
    <script>
        function changeQuantity(amount) {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            let newValue = currentValue + amount;

            // Ensure the value does not go below the minimum
            if (newValue < 1) {
                newValue = 1;
            }

            quantityInput.value = newValue;
            document.getElementById('form-quantity').value = newValue; // Update hidden input value
        }

        document.getElementById('quantity').addEventListener('input', function() {
            let value = parseInt(this.value);

            if (isNaN(value) || value < 1) {
                this.value = 1;
            }

            document.getElementById('form-quantity').value = this.value; // Update hidden input value
        });

        // document.addEventListener('DOMContentLoaded', () => {
        //     const textarea = document.getElementById('comment');
            
        //     textarea.addEventListener('input', () => {
        //         textarea.style.height = 'auto';
        //         textarea.style.height = (textarea.scrollHeight) + 'px';
        //     });
        // });
    </script>
</body>
</html>