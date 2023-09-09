<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

@include('header.index')

<body>
    <!-- Start Main Top -->
@include('header.menu')
    <!-- End Main Top -->

    <div class="container-fluid p-5">
    <h1 class="app-page-title">New Orders Here
        <span class="float-right mb-2"><a href="{{route('users-orders-history')}}" class="btn btn-warning text-white">Orders History</a></span>
    </h1>
	
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="cell">#{{$order->id}}</td>
                                    <td class="cell">{{$order->name}}</td>
                                    <td class="cell"><span class="note">{{$order->created_at}}</span></td>
                                    <td class="cell"><span class="badge bg-warning">{{$order->status == '0' ?'pending' : 'completed'}}</span></td>
                                    <td class="cell"> &#x20A6; {{$order->total_price}}</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('users-view-orders',$order->id )}}">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div><!--//table-responsive-->
                    
                </div><!--//app-card-body-->		
            </div><!--//app-card-->
            
        </div><!--//tab-pane-->

    </div><!--//container-fluid-->
    </div>



    <!-- Start Footer  -->
    @include('footer.content')
    <!-- End Footer  -->

    @include('footer.assets')
</body>

</html>