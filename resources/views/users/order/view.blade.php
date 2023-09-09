<!DOCTYPE html>
<base href="/public">
<html lang="en">
<!-- Basic -->

@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->

    <div class="container-fluid p-5">
    <div class="card">

<div class="card-header">
    <h4 class="text-black">Orders View
        <a href="{{route('my-orders')}}" class="btn btn-warning text-white float-right">Back</a>
    </h4>
</div><!-- card-header end  -->

<div class="card-body">
    <div class="row">
        <div class="col-lg-7">
            <h4>Shipping Details</h4>

            <div class="row">

            <!-- fetching data of user from both users and order_couriers tables  -->
                <div class="col-sm-6">
                    <label class="mt-3">User's Name</label>
                    <div class="border p-2">{{ $orders->name }}</div>
                </div>
                <div class="col-sm-6">
                    <label class="mt-3">Email</label>
                    <div class="border p-2">{{ $orders->email }}</div>
                </div>

                <div class="col-sm-6">
                    <label class="mt-3">State</label>
                    <div class="border p-2">{{ $orders->state }}</div>
                </div>

                <div class="col-sm-6">
                    <label class="mt-3">Phone</label>
                    <div class="border p-2">{{ $orders->phone }}</div>
                </div>

                <div class="col-sm-6">
                    <label class="mt-3">Address</label>
                    <div class="border p-4">
                        {{ $orders->address }}
                    </div>
                </div>

                <div class="col-sm-6">
                    <label class="mt-3">Order Note</label>
                    <div class="border p-4">{{ $orders->message }}</div>
                </div>
            </div><!-- row end  -->
        </div><!-- col-lg-7 end  -->

        <div class="col-lg-5 mt-5 px-2">
            <h5>Order Details</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>price</th>
                        <th>Qty</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->order_items as $item)
                    <tr>
                        <td>{{ $item->products->name }}</td>
                        <td>{{ $item->products->categories->name }}</td>
                        <td> &#x20A6;{{ $item->price }}</td>
                        <td>{{ $item->prod_qty }}</td>
                        <td>
                            <img src="/productimage/{{$item->products->image}}"
                                width="80px" height="80px" alt="Product image">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h6 class="px-2">Grand Total: <span class="float-end"> &#x20A6;{{ $orders->total_price }}</span><!-- Calculated grand total of price  -->
            </h6>

            <div>
                <h5 class="mt-4">Payment Receipt(Bank Transfer)</h5>
                <div class="product__item">
                    <img src="/receipt/{{$orders->image}}" width="250" height="300" alt="">
                </div>
            </div> 
        </div><!-- col-lg-5 end  -->
    </div><!-- row end  -->

</div><!-- card-body end  -->
</div><!-- card end  -->
    </div>



    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->

    @include('footer.assets')
</body>

</html>