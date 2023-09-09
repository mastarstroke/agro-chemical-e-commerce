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
			    
			<h1 class="app-page-title">Uploaded Products</h1>
			    
                <div class="card-header mb-4">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('add/products')}}" class="btn btn-primary float-end text-white"><i class="fas fa-plus"></i>
                            Add New
                            Product</a>
                    </div>
                </div>
                </div><!-- card-header end  -->

            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form action="{{route('view/product') }}" method="get" class="table-search-form row gx-1 align-items-center">
                             @csrf
                            <div class="col-auto">
                                <input type="text" name="productName" class="form-control search-orders" placeholder="Search by Prodouct Name">
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
                                            <th style="padding: 7px;">Category</th>
                                            <th style="padding: 7px;">Name</th>
                                            <th style="padding: 7px;">Old_price</th>
                                            <th style="padding: 7px;">New_price</th>
                                            <th style="padding: 7px;">Qty</th>
                                            <th style="padding: 7px;">Trending</th>
                                            <th style="padding: 7px;">Desc</th>
                                            <th style="padding: 7px;">Image</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
										</thead>
										<tbody>

                                             @foreach($products as $key => $product)
                                             <tr>
                                                <td style="padding: 7px;">{{$key + 1}}</td>
                                                <td style="padding: 7px;">{{$product->categories->name}}</td>
                                                <td style="padding: 7px;">{{$product->name}}</td>
                                                <td style="padding: 7px;"> &#x20A6;{{$product->original_price}}</td>
                                                <td style="padding: 7px;"> &#x20A6;{{$product->selling_price}}</td>
                                                <td style="padding: 7px;">{{$product->qty}}</td>
                                                <td style="padding: 7px;">{{$product->trending}}</td>
                                                <td style="padding: 7px;">{{$product->description}}</td>
                                                <td><img height="80" width="80" class="mb-2" src="/productimage/{{$product->image}}" alt=""></td>
                                                <td>
                                                    
                                                <!-- edit and delete here -->
                                                <a href="{{route('edit-product', $product->id)}}"
                                                    class="btn btn-outline-primary btn-lg"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                                    ('delete-form-{{$product->id}}').submit();" class="btn btn-outline-danger btn-lg"><i
                                                        class="fas fa-trash"></i></a>
                                                        <form action="{{route('delete-product', $product->id)}}" syle="display: none;"
                                                    method="post" id="delete-form-{{$product->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </td>
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
                                    {{$products->onEachSide(1)->links()}} 
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