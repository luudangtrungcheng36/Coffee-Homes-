<div class="footer">
    <div class="main-content">
        <div class="body row">
            <div class="news">
                <p class="title">TIN TỨC</p>
                <div class="news-item row">
                    <img src="{{asset('frontend\assets\img\product\productexample.jpg')}}" alt="">
                    <div class="des">
                        <a href="#" class="title-child">Pudding xoài dâu tây thơm mát ngày hè</a>
                        <p class="des-child">Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú. 1 Pudding xoài dâu tây thơm mát ngày hè </p>
                    </div>
                </div>
            </div>
        
            <div class="category">
                <p class="title">DANH MỤC SẢN PHẨM</p>
                <ul class="list-category">
                    @foreach ($categories as $category)
                        <li><a href="">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        
            <div class="address">
                <div class="logo"><a href="">Coffee Homes</a></div>
                <div class="address-detail">
                    <p><i class="fa-solid fa-location-dot"></i> Địa chỉ: Tầng 7 Đoàn Hải Plaza, Số 756 Trường Chinh, Tân Bình, Hồ Chí Minh</p><br>
                    <p><i class="fa-solid fa-phone"></i> Hotline: 02866860863</p><br>
                    <p><i class="fa-solid fa-envelope"></i> Mail: Kinhdoanh@weba.vn</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('success'))
<script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true,
    }
    toastr.success("{{ Session::get('success')}}", 'Success!', {timeOut:12000});
</script>
@endif

@if(Session::has('error'))
<script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true,
    }
    toastr.error("{{ Session::get('error')}}", 'Error!', {timeOut:12000});
</script>
@endif

@if(Session::has('warning'))
<script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true,
    }
    toastr.warning("{{ Session::get('warning')}}", 'Warning!', {timeOut:12000});
</script>
@endif
