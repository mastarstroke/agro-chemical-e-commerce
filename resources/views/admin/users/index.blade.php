<!DOCTYPE html>
<html lang="en"> 
<head>
<title>Twinshotim - Add Product</title>
@include('admin.header.index')

</head>
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
			    
			<h1 class="app-page-title">Register Users</h1>

            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form action="{{route('view/product') }}" method="get" class="table-search-form row gx-1 align-items-center">
                             @csrf
                            <div class="col-auto">
                                <input type="text" name="productName" class="form-control search-orders" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>
                        
                    </div><!--//col-->

                <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
                                        <tr>
                                            <th style="padding: 7px;">Sl.No</th>
                                            <th style="padding: 7px;">Name</th>
                                            <th style="padding: 7px;">Email</th>
                                            <th style="padding: 7px;">Phone</th>
                                            <th style="padding: 7px;">Address</th>
                                            <th style="padding: 7px;">State</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
										</thead>
										<tbody>

                                             @foreach($users as $key => $user)
                                             <tr>
                                                <td style="padding: 7px;">{{$key + 1}}</td>
                                                <td style="padding: 7px;">{{$user->name}}</td>
                                                <td style="padding: 7px;">{{$user->email}}</td>
                                                <td style="padding: 7px;">{{$user->phone}}</td>
                                                <td style="padding: 7px;">{{$user->address}}</td>
                                                <td style="padding: 7px;">{{$user->state}}</td>
                                        </tr>
                                         @endforeach
    
                                        </tbody>
                                        </table>
                                        
                                        </div><!--//table-responsive-->
                                    
                                        </div><!--//app-card-body-->		
                                    </div><!--//app-card-->
                        
                                </div><!--//tab-pane-->

                                <div class="col-lg-12">
                                    <div class="pagination__option">
                                    {{$users->onEachSide(1)->links()}} 
                                    </div>
                                </div>    
			    
				</div><!--//tab-content-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</script>

</body>
</html>