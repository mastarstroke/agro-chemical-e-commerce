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
                    <h2>ABOUT US</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ABOUT US</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img width="350" src="front/images/about.jpeg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <h2 class="noo-sh-title-top">We are <span>{{$settings->b_name}}</span></h2>
                    <h3>{{$settings->ab_title}}</h3>
                    <p>{{$settings->ab_desc}}.</p>
					<a class="btn hvr-hover" href="{{route('shop-view')}}">Shop with us?</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End About Page -->

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