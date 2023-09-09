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
			    <h1 class="app-page-title">Add New Account 
				<span class="col-md-12">
						<a href="{{route('settings/view')}}" class="btn btn-warning float-end text-white"><i class="fas fa-arrow-left"></i>
						Back to Settings</a>
					</span>
				</h1>
			    <hr class="mb-4">
				<div class="row g-4 settings-section">
					<!-- Alert here -->
						<div class="col-12">
							@include('admin.alert')
						</div>
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Addind new Account</h3>
		                <div class="section-intro">This account will be added to your settings and it will be ready for activation!</a></div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						<div class="app-card-body">
						<form action="settings/account/store" method="POST">
							@csrf
							<div class="mb-3">
							<label for="setting-input-1" class="form-label">Payment Type</label>
								<input type="text" class="form-control" id="setting-input-1" name="ac_payment">
							</div>
							<div class="mb-3">
							<label for="setting-input-1" class="form-label">Account Name</label>
								<input type="text" class="form-control" id="setting-input-1" name="ac_name">
							</div>
							<div class="mb-3">
								<label for="setting-input-2" class="form-label">Account Number</label>
								<input type="text" class="form-control" id="setting-input-2" name="ac_no">
							</div>
							<div class="mb-3">
								<label for="setting-input-2" class="form-label">Bank</label>
								<input type="text" class="form-control" id="setting-input-1" name="ac_bank">
							</div>
							<div class="pb-5">
								<button type="submit" class="btn app-btn-primary float-end">Save Changes</button>
							</div>
						</form>
						</div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->

				<hr class="my-3">
			    <hr class="my-4">

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
		<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->  					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</script>

</body>
</html>