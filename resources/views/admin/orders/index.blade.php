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
			    
			    <h1 class="app-page-title">New Orders Here
					<span class="float-end"><a href="{{route('order-history')}}" class="btn btn-warning text-white">Orders History</a></span>
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
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('view-order',$order->id )}}">View</a></td>
											</tr>
                                            @endforeach
										</tbody>
									</table>

						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
			        </div><!--//tab-pane-->

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</body>
</html> 

