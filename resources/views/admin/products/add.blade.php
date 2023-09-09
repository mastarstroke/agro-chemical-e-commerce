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
			    
			    <h1 class="app-page-title">Add Product Here</h1>
			    
                <!-- Alert here -->
                <div class="col-12">
                     @include('admin.alert')
                </div>

                <div class="card">
        <div class="card-header">
            <h4>Add products</h4>
        </div>
        <div class="card-body">
            <form action="{{route('add/product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
                <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="">Category</label>
                        <select class="form-select form-control py-2" name="cate_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original price</label>
                        <input type="number" class="form-control" name="original_price" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty" placeholder="eg: 1, 2, 3">
                    </div>

                    <div class="col-md-6 mt-4">
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="col-md-6 my-4">
                        <label for="">Trending</label>
                        <input type="checkbox"  name="trending">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="small_description" rows="50" cols="30" class="form-control py-5"></textarea>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary text-white mt-3">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
      </div>
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</body>
</html> 

