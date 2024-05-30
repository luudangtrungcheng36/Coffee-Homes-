<div class="header">
    <div class="main-content">
        <div class="body">
            <div class="logo"><a href="{{route('home.index')}}">Coffee Homes</a></div>

            <nav class="header_nav">
                <div class="menu">
                    <div class="menu-top">
                        <ul class="menu_nav roboto-bold">
                            <li><a href="{{route('home.index')}}"><i class="fa-solid fa-house-chimney"></i> TRANG CHỦ</a></li>
                            <li><a href="#">GIỚI THIỆU</a></li>
                            <li class="sub-menu">
                                <a href="#"
                                    >SẢN PHẨM
                                    <i
                                        class="fa-solid fa-chevron-down"
                                    ></i
                                ></a>
                                <ul class="menu-item">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('listProduct.show', ['id' => $category->id])}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('home.allNews')}}">TIN TỨC</a></li>
                            <li><a href="#">LIÊN HỆ</a></li>

                        </ul>
                    </div>

                    <div class="menu-bot-contain">
                        <ul class="menu_nav roboto-regular menu-bot">
                            @guest
                                <li>    
                                    <a href="{{route('user.index')}}"
                                        ><i
                                            class="fa-solid fa-user"
                                            
                                        ></i
                                    > Đăng ký thành viên</a>
                                </li>
                                <li><a href="{{route('user.login')}}"><i class="fa-solid fa-key"></i> Đăng nhập</a></li>
                            @else 
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <li class="sub-menu">
                                    <a href="{{route('user.user_detail', ['id' => Auth::user()->id]) }}">
                                        <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="menu-item">
                                        <li><a href="{{route('user.user_detail', ['id' => Auth::user()->id]) }}">Tài khoản của tôi</a></li>
                                        <li><a href="{{route('checkout.history')}}">Đơn hàng của tôi</a></li>
                                        <li><a href="">Đổi mật khẩu </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-sign-out-alt"></i> Đăng xuất
                                    </a>
                                </li>
                            @endguest

                            <li class="cart-menu-item">
                            <a href="{{route('cart.index')}}"
                                    ><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng
                                @if($carts && $carts->isNotEmpty()) 
                                    <span class="cart-count">{{$carts->sum('quantity')}}</span>
                                @endif
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>