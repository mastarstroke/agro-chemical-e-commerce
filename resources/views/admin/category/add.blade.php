<!DOCTYPE html>
<html lang="en"> 
<head>
<title>Twinshotim - Add Category</title>
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
			    
			    <h1 class="app-page-title">Add Category here</h1>
			    
                <!-- Alert here -->
                <div class="col-12">
                     @include('admin.alert')
                </div>

            <div class="card">
                <div class="card-header">
                    <h4>Add category</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('add/category')}}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
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

