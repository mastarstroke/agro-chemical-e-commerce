<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop: Our Stock</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

        <!-- Start Shop Page  -->
        <div class="shop-box-inner">
        <div class="container">
            <div class="row">
            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                        <div class="special-menu">
                            <div class="button-group filter-button-group">
                                <button class="list-group-item list-group-item-action" data-filter="*">All</button>
                                    @foreach($categories as $category)
                                    <button class="list-group-item list-group-item-action" data-filter=".{{$category->name}}">{{$category->name}}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-sm-12 col-xs-12 shop-content-right">
                    
                    <div class="row special-list">
                        @foreach($products as $product)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-5 special-grid {{$product->categories->name}}">
                            <a href="{{route('product/details', $product->id)}}">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <div class="type-lb">
                                        <p class="sale">New</p>
                                    </div>
                                    <img src="/productimage/{{$product->image}}" class="shop-img" height="150" width="210" alt="Image">
                                </div>
                                <div class="why-text">
                                    <h4>{{$product->name}}</h4>
                                    <h6 class="mt-3"> <s> &#x20A6;{{$product->original_price}} </s> </h6>
                                    <h5 class="float-end px-4">  &#x20A6;{{$product->selling_price}}</h5>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                        <div class="col-lg-12">
                            <div class="pagination__option">
                            {{$products->onEachSide(1)->links()}} 
                            </div>
                        </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

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