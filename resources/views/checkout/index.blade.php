<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<base href="/public">
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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <!-- Alert here -->
        <div class="col-12">
         @include('alert')
        </div>
        <div class="container">
            <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form action="" id="billing-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Name *</label>
                                    <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="{{ Auth::user()->name }}" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" id="address"  value="{{ Auth::user()->address }}" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone *</label>
                                <input type="text" class="form-control" name="phone" id="phone"  value="{{ Auth::user()->phone }}"> 
                            </div>
                            <div class="mb-3">
                                <label for="state">State *</label>
                                <input type="text" class="form-control" name="state" id="state"  value="{{ Auth::user()->state }}"> 
                            </div>
                            <div class="mb-3">
                                <label for="state">Country *</label>
                                <input type="text" class="form-control" name="country" id="country"  value="{{ Auth::user()->country }}"> 
                            </div>
                            <div class="mb-3">
                                <label for="state">Order Note(optional)</label>
                                <textarea class="form-control" name="message"
                                    cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div>
                          

                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    @php $total = 0; @endphp
                    @php $grandtotal = 0; @endphp
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                @foreach($cartViews as $key => $cartView)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> {{$cartView->name}}</a>
                                            <div class="small text-muted">&#x20A6; {{$cartView->selling_price}} 
                                                <span class="mx-2">|</span> Qty: {{$cartView->quantity}} 
                                                <span class="mx-2">|</span> Subtotal: <?php $total = $cartView->selling_price * $cartView->quantity; ?>
                                                            &#x20A6; <?php echo $total ?>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                        <img width="100" height="100" class="ml-5" src="/productimage/{{$cartView->image}}" alt="" />
                                        </div>
                                    </div>
                                    <?php $grandtotal += $total; ?>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box mt-3">
                                <div class="title-left">
                                    <h3>Your Order Breakdown</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> &#x20A6; <?php echo $grandtotal ?> </div>
                                </div>

                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> &#x20A6; <?php echo $grandtotal ?> </div>
                                </div>
                            </div>
                        </div>
                        @if($cartViews ->count() > 0)
                        <div class="col-md-12 col-lg-12">
                        <hr class="mb-4">
                            <div class="title"> <h3>Payment</span> </h3>
                            <div class="d-block my-3">
                               
                            <button class="btn btn-primary w-100 float-center" onclick="openForm()">
                            Bank Payment <span class="float-right"><i class="fas fa-arrow-down"></i></span> </button>

                            <div id="myForm" class="card-from">
                                <div class="row mt-3">
                                <div class="col-12 mb-2">
                                    <p><strong>Note:</strong> Use This Bank Details to make payment and upload your receipt
                                        using. Your payment would be confirmed before delivery proceed. Thanks</p>
                                        @foreach($accounts as $account)
                                        @if($account->active == 'Yes')
                                        <div class="my-4">
                                            <h4>Account Number: <strong>{{$account->ac_no}}</strong></h4>
                                            <h4>Account Name: <strong>{{$account->ac_name}}</strong></h4>
                                            <h4>Account Bnak: <strong>{{$account->ac_bank}}</strong></h4>
                                            <hr class="my-2">
                                        </div>
                                        @endif
                                        @endforeach
                                    
                                @if($image)
                                    Photo Preview::
                                    <img height="100" width="100" class="" src="{{$image->temporaryUrl() }}" alt="">
                                    @endif

                                    <br>

                                    <div class="">
                                        <h4>Please Upload payment receipt here!</h4>
                                    </div>

                                    <input type="file" name="image" required>
                                </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <input type="hidden" name="total_price" value="{{$grandtotal}}">
                                        <button type="button" class="btn btn-success w-100"
                                        onclick="bankPayment()">Confirm &#x20A6; <?php echo $grandtotal ?></button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger w-100 cancel"
                                            onclick="closeForm()">Close</button>
                                    </div>
                                </div>

                            </div><!-- End .card form -->

                        @endif

                            </div>
                            
                            <hr class="mb-1"> </form>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- End Cart -->


    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->

 <script>

// function including route for Card/Stripe payment
function bankPayment() {
    $('#billing-form').attr('action', '{{route('place-order')}}').submit();
}
</script>

    @include('footer.assets')
</body>

</html>