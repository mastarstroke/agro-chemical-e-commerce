<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="front/images/carousel 1.jpg" alt="">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> {{$settings->b_name}}</strong></h1>
                            <p class="m-b-40">We deal in all kinds of agro-chemicals and feeds and other agricultural products and services <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="{{route('shop-view')}}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="front/images/carousel 2.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> {{$settings->b_name}}</strong></h1>
                            <p class="m-b-40">We deal in all kinds of agro-chemicals and feeds and other agricultural products and services <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="{{route('shop-view')}}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="front/images/carousel 3.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> {{$settings->b_name}}</strong></h1>
                            <p class="m-b-40">We deal in all kinds of agro-chemicals and feeds and other agricultural products and services <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="{{route('shop-view')}}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- End Slider -->
	
	<div class="box-add-products">
		<div class="container">
            <div class="title-all text-center">
                <h1>Best Selling Products</h1>
            </div>
			<div class="row">
				<div class="col-lg-12">
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($trending as $trend)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                            <img width="320" height="300" class="my-3" src="/productimage/{{$trend->image}}" alt="" />
                                <div class="mask-icon">
                                    <a class="cart" href="{{route('product/details', $trend->id)}}">Buy Product</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{$trend->name}}</h4>
                                <h6> <s> &#x20A6;{{$trend->original_price}} </s> </h6>
                                <h5>&#x20A6; {{$trend->selling_price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
				</div>
			    </div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Our Products</h1>
                        <p>These are varieties of our avaible products with different categories in the filter.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            @foreach($categories as $category)
                            <button data-filter=".{{$category->name}}">{{$category->name}}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">

                @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-5 special-grid {{$product->categories->name}}">
                    <a href="{{route('product/details', $product->id)}}">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">New</p>
                            </div>
                            <img src="/productimage/{{$product->image}}" class="product-img"
                            height="200" width="280" alt="Image">
                        </div>
                        <div class="why-text">
                            <h4>{{$product->name}}</h4>
                            <h6> <s> &#x20A6;{{$product->original_price}} </s> </h6>
                            <h5 class="float-end px-4">  &#x20A6;{{$product->selling_price}}</h5>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
            </div>
            <p><a class="btn hvr-hover text-white text-center w-100" href="{{route('shop-view')}}">See all Products?</a></p>

        </div>
    </div>
    
    <!-- End Products  -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
        @foreach($trending as $product)

            <div class="item">
                <div class="ins-inner-box">
                    <img height="220" width="480" class="px-2" src="/productimage/{{$product->image}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <div style="bottom:8px; left:8px; position:fixed; z-index:99;">
        <a class="btn btn-success mb-4 py-0 px-1 text-white outline-none" href=" https://wa.me/+2349072002503?text=Hello%20Twinshotim-Agro%20...">
            <img src="/images/whatsapp.png" alt="" height="40px" width="40px">
            Chat Us?
        </a>
    </div>
    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->
    
    @include('footer.assets')
</body>

</html>