@extends('customer.layout.app')
@section('title','Danh mục')
@section('content')
<style>
	.single-product-area .pagination>.active>span{
		background-color: #009a82;
    border-color: #009a82;
	}
	.paginate-product{
		text-align: center;
	}
</style>
 <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{$cate_list[0]['name']}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            		@foreach($list_product as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product" style="text-align: center; cursor: pointer;">
                        <div class="product-upper">
                            <a href="{{route('customer.product',$product->slug)}}"><img src="{{asset('storage/'.$product['thumbnail'])}}" alt=""></a>
                        </div>
                        <h2><a href="">{{$product['name']}}</a></h2>
                        <div class="product-carousel-price">
                            <ins style="color: red;">{{number_format($product['price'])}} đ</ins> <del></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-id="{{$product['product_id']}}" rel="nofollow" href="{{route('customer.cart.add',$product['product_id'])}}">Add to cart</a>
                        </div>                       
                    </div>
                </div>
                @endforeach
            </div>
            <div class="paginate-product">
           {{ $list_product->links()}}
           </div>
        </div>
    </div>
@endsection('content')

@section('script2')
    <script>
        $(document).ready(function(){

            $('.add_to_cart_button').click(function(event){
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
                            $('.product-count').html(data);
                            
                        },
                    });
        
            });
            
        });
    </script>
@endsection('script2')