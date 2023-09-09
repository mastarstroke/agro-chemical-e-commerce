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
			    
			    <h1 class="app-page-title">Overview</h1>
			    
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Welcome, {{ Auth::user()->name }}!</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        
							        <div>This is your personal Dashboard where you manage and control the whole web application.</div>
							    </div><!--//col-->

						    </div><!--//row-->
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Sales</h4>
							    <div class="stats-figure">&#x20A6; {{$totalSales}}</div>
							    <div class="stats-meta text-success">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
								</svg></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{route('order-history')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">New Orders</h4>
							    <div class="stats-figure">{{$newOrders}}</div>
							    <div class="stats-meta text-success">
								    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
									</svg></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{route('new-orders')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Products</h4>
							    <div class="stats-figure">{{$allProducts}}</div>
							    <div class="stats-meta">
								    Available</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{route('view/product')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">All Users</h4>
							    <div class="stats-figure">{{$allUsers}}</div>
							    <div class="stats-meta">New</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="{{route('users/view')}}"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    <div class="row g-4 mb-4">
			        
				<div class="row g-3 mt-5 align-items-center justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Orders</h1>
					</div>
					
			    </div><!--//row-->
				
				
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
												@if($order->status == '0')
												<td class="cell"><span class="badge bg-warning">pending</span></td>
												@else
												<td class="cell"><span class="badge bg-success">completed</span></td>
												@endif
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
	    
	    <footer class="app-footer">
		    @include('admin.footer.content')
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</body>
</html> 

