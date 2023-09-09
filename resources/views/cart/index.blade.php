<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<base href="/public">
@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->


        </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
        <!-- Alert here -->
        <div class="col-12">
            @include('alert')
        </div>
        @if($cartViews->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $total = 0; @endphp
                            @php $grandtotal = 0; @endphp
                                @foreach($cartViews as $cartView)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                        <img width="80" height="80" src="/productimage/{{$cartView->image}}" alt="" />
                                    </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                        {{$cartView->name}}
                                    </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>&#x20A6; {{$cartView->selling_price}}</p>
                                        </td>
                                        <td class="quantity-box">{{$cartView->quantity}}</td>
                                        <td class="total-pr">
                                        <?php $total = $cartView->selling_price * $cartView->quantity; ?>
                                            <p>&#x20A6; <?php echo $total ?></p>
                                        </td>
                                        <td class="remove-pr">
                                        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                        ('delete-form-{{$cartView->id}}').submit();"><i class="fas fa-times"></i></a>                   
                                        <form action="{{route('delete-cart', $cartView->id)}}" syle="display: none;"
                                            method="post" id="delete-form-{{$cartView->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                <?php $grandtotal += $total; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            
                            <div class="ml-auto font-weight-bold"> &#x20A6; <?php echo $grandtotal ?> </div>
                        </div>
                        <hr class="my-1">

                        <div class="d-flex">
                            <h4>Delivering Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> &#x20A6; <?php echo $grandtotal ?> </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{route('checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

            @else
                <div class="text-center">
                    <h2 class="text-danger">Your <i class="fa fa-shopping-bag"></i> Cart is empty</h2>
                        <a href="{{route('shop-view')}}" class="btn hvr-hover mt-3 text-white">Buy From us ?</a>
                </div>
            @endif


        </div>
    </div>
    <!-- End Cart -->


    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->

    @include('footer.assets')
</body>

</html>