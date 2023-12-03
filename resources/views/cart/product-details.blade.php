<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<base href="/public">
@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">

        <!-- Alert here -->
        <div class="col-12">
            @include('alert')
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block" width="370" height="380" src="/productimage/{{$products->image}}" alt="First slide"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$products->name}}</h2>
                        <h5> <del> &#x20A6;{{$products->original_price}}</del> &#x20A6;{{$products->selling_price}}</h5>
                        <p class="available-stock"><span class="badge badge-success"> {{$products->qty}}</span> of this product available<p>
						<h4>Description:</h4>
						<p>{{$products->description}} </p>

                         <form action="{{route('addtocart', $products->id)}}" method="POST">
                            @csrf

						<ul>
							<li>
								<div class="form-group quantity-box">
                                @if(Auth::id())
									<label class="control-label">Quantity <small>(How many do you want?)</small></label>
									<input class="form-control" name="qty" min="1" max="{{$products->qty}}" type="number" required>
                                @else
                                <label class="control-label">If You want more than one or products. Please add to cart.</label>
                                @endif
                                </div>
							</li>
						</ul>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<a href="{{route('buy-checkout', $products->id )}}" class="btn btn-success mr-2">Buy Now</a>
								<button class="btn btn-primary" type="submit">Add to cart</button>
							</div>
						</div>
                     </form>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>Products with category similarities that you can also like to check.</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($featured as $feature)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="/productimage/{{$feature->image}}" height="200" width="80" alt="Image">
                                    <div class="mask-icon">
                                        <a class="cart" href="{{route('product/details', $feature->id)}}">Check Product</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>{{$feature->name}}</h4>
                                    <h5>&#x20A6; {{$feature->selling_price}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->

    @include('footer.assets')
</body>

</html>