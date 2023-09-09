<!DOCTYPE html>
<html lang="en">
@include('admin.header.index')
<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        @include('admin.header.navbar')
        </div><!--//app-header-inner-->

        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        @include('admin.header.sidebar')
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">View Order</h1>
        <div class="card">

            <div class="card-header">
            <h4 class="text-black">Orders View
                <a href="{{route('new-orders')}}" class="btn btn-warning text-white float-end">Back</a>
            </h4>
            </div><!-- card-header end  -->

            <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Shipping Details</h4>

                    <div class="row">

                    <!-- fetching data of user from both users and order_couriers tables  -->
                        <div class="col-sm-6">
                            <label class="mt-3">User's Name</label>
                            <div class="border p-2">{{ $orders->name }} {{ $orders->lname }}</div>
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

                <div class="col-lg-6 mt-5 px-2">
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
                                <td class="px-0">{{ $item->products->name }}</td>
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

                    <div class="row">
                        <div class="col-md-5">
                            <div class="mt-4">
                                <label for="">Order Status</label>
                                <form action="{{route('update-order', $orders->id)}}" method="POST"><!-- Form started  -->
                                    @csrf

                                    <select class="form-select" name="order_status">
                                        <option {{ $orders->status == '0'? 'selected': '' }} value="0">Pending
                                        </option><!-- if status is NEW = select pending from the option  -->

                                        <option {{ $orders->status == '1'? 'selected': '' }} value="1">Completed
                                        </option><!-- if status is 1 = select completed from the option  -->
                                    </select>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-secondary py-1 mt-3 text-white">Update</button><!-- update option button  -->
                                        </div>
                                    </div>
                                </form><!-- form end  -->
                            </div><!-- Div mt-4 end  -->
                        </div><!-- col-md-5 end  -->

                        </div>

                    </div><!-- row end  -->


                </div><!-- col-lg-5 end  -->
            </div><!-- row end  -->

            </div><!-- card-body end  -->
            </div><!-- card end  -->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</body>
</html> 

