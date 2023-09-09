<!DOCTYPE html>
<html lang="en"> 
<head>
<title>Twinshotim - Categories</title>

@include('admin.header.index')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

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
			    
			    <h1 class="app-page-title">Categories Here</h1>

                <div class="card-header mb-4">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('add/categories')}}" class="btn btn-primary float-end text-white"><i class="fas fa-plus"></i>
                                Add New
                                Category</a>
                        </div>
                    </div>
                </div><!-- card-header end  -->

                <div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
                                                <th>Sl. No</th>
                                                <th class="px-4">Name</th>
                                                <th>Description</th>
                                                <th></th>
                                                <th></th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td class="px-4">{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>
                                                    
                                                    <!-- edit and delete here -->
                                                    <a href="{{route('edit-category', $category->id)}}"
                                                        class="btn btn-outline-primary btn-md"><i class="fas fa-edit"></i></a>
                                                        </td>
                                                        <td>
                                                        
                                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
                                                        ('delete-form-{{$category->id}}').submit();" class="btn btn-outline-danger btn-md"><i
                                                            class="fas fa-trash"></i></a>
                                                    <form action="{{route('delete-category', $category->id)}}" syle="display: none;"
                                                        method="post" id="delete-form-{{$category->id}}">
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
					
				</div><!--//tab-content-->

			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					

 
<!-- Javascript -->          
@include('admin.footer.assets')

</body>
</html> 

