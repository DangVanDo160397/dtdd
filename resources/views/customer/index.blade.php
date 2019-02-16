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
                        <i class="fas fa-sync-alt"></i>
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
                                        <a href="{{route('customer.cart.add',$product['product_id'])}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
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
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-1.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-2.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new mac book 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-3.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Xem nhiều nhất</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-4.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-1.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-2.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Mới nhất</h2>
                        <a href="#" class="wid-view-more">Xem tất cả</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-3.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-4.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="{{asset('frontend/img/product-thumb-1.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

    <div class="new">
        <div class="container">
            <h2 class="section-title">Tin tức nổi bật</h2>
            <div class="row">
                <div class="col-md-4">1</div>
                <div class="col-md-4">2</div>
                <div class="col-md-4">3</div>
            </div>
        </div>
    </div>
@endsection('content')