@extends('customer.layout.app')
@section('title','Trang chủ')
@section('content')
<style>
.slider-area .slider-bar  .owl-dot span{
    width: 15px;
    height: 15px;
    background: #009a82;
}
.product-widget-area{
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 20px;
}
</style>
<div class="slider-area">
   <!-- Slider -->
   <div class="slider-bar">
       <div class="slide-carousel owl-theme">
        <div class="item">
            <img src="{{asset('frontend/img/slide/slide-1.png')}}" alt="">
        </div>
        <div class="item">
            <img src="{{asset('frontend/img/slide/slide-2.png')}}" alt="">
        </div>
        <div class="item">
            <img src="{{asset('frontend/img/slide/slide-3.png')}}" alt="">
        </div>
        <div class="item">
            <img src="{{asset('frontend/img/slide/slide-1.png')}}" alt="">
        </div>
        <div class="item">
            <img src="{{asset('frontend/img/slide/slide-5.png')}}" alt="">
        </div>
    </div>      
</div>
<!-- ./Slider -->
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fas fa-sync-alt" id="test"></i>
                    <p>Hoàn trả trong 30 ngày đầu tiên</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Miễn phí ship nội thành</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Bảo mật trong thanh toán</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>Luôn có sản phẩm mới nhất</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            @foreach($cate_list as $cate)
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title"><a style="color:#00483e" href="{{route('customer.category',$cate->slug)}}">{{ $cate->name}}</a></h2>
                    <div class="product-carousel">
                        <?php 
                        $list_product = $cate->product;
                        ?>
                        @foreach($list_product->all() as $product)
                        <div class="single-product" style="text-align: center;">
                            <div class="product-f-image">
                                <img src="{{asset('storage/'.$product['thumbnail'])}}" alt="">
                                <div class="product-hover">
                                    <a href="{{$product['product_id']}}" id="cart" data-id="{{$product['product_id']}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Giỏ hàng 
                                        {{csrf_field()}}
                                    </a>
                                    
                                    <a href="{{route('customer.product',$product['product_id'])}}" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                </div>
                            </div>
                            
                            <h2><a href="{{route('customer.product',$product['product_id'])}}">{{$product['name']}}</a></h2>
                            
                            <div class="product-carousel-price">
                                <ins style="color:red;">{{number_format($product['price'])}} <span style="text-decoration: underline;">đ</span></ins> <del></del>
                            </div> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>  
            @endforeach
        </div>

        
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="{{asset('frontend/img/brand1.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand2.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand3.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand4.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand5.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand6.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand1.png')}}" alt="">
                        <img src="{{asset('frontend/img/brand2.png')}}" alt="">                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Bán chạy</h2>
                    <a href="" class="wid-view-more">Xem tất cả</a>
                    @foreach($product_random as $random)
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="{{asset('storage/'.$random->thumbnail)}}" alt="" class="product-thumb"></a>
                        <h2><a href="{{route('customer.product',$random->product_id)}}">{{$random->name}}</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>{{number_format($random->price)}} đ</ins> <del></del>
                        </div>                            
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Sản phẩm nổi bật</h2>
                    <a href="#" class="wid-view-more">Xem tất cả</a>
                    @foreach($product_top_hot as $hot)
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="{{asset('storage/'.$hot->thumbnail)}}" alt="" class="product-thumb"></a>
                        <h2><a href="{{route('customer.product',$hot->product_id)}}">{{$hot->name}}</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>{{number_format($hot->price)}} đ</ins> <del></del>
                        </div>                            
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Mới nhất</h2>
                    <a href="#" class="wid-view-more">Xem tất cả</a>
                    @foreach($product_top_date as $date)
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="{{asset('storage/'.$date->thumbnail)}}" alt="" class="product-thumb"></a>
                        <h2><a href="{{route('customer.product',$date->product_id)}}">{{$date->name}}</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>{{number_format($date->price)}} đ</ins> <del></del>
                        </div>                            
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <h2 class="section-title"><a style="color:#00483e" href="#">Tin tức</a></h2>
        <div class="row">

            @foreach($list_news as $new)
            <div class="col-md-4">
                <div class="single-product-widget">
                    <div class="single-wid-product">
                        <a href="single-product.html"><img src="{{asset($new->thumbnail)}}" alt="" class="product-thumb"></a>
                        <h3><a href="{{route('customer.product',$random->product_id)}}">{{$new->title}}</a></h3>
                        <p>{{preg_replace('/((\w+\W*){'.(10).'}(\w+))(.*)/', '${1}', $new->content).'...'}}</p>
                        <div class="product-wid-price">
                            <ins></ins> <del></del>
                        </div>                            
                    </div>  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> <!-- End product widget area -->
@endsection('content')
@section('script2')
<script>
    $(document).ready(function(){

        $('.add-to-cart-link').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var url = "{{route('customer.cart.add')}}";
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: url,
                method: "post",
                data: {id:id, _token:_token},
                success: function(data){
                    console.log(data);
                    $('#quantity').html(data);
                    
                },
            });
            
        });
        
    });
</script>
@endsection('script2')