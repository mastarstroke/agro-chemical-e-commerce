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
			    <h1 class="app-page-title">Settings</h1>
			    <hr class="mb-4">
				<form class="settings-form" action="{{route('settings/change')}}" method="POST">
					@csrf
                <div class="row g-4 settings-section">
					<!-- Alert here -->
					<div class="col-12">
						@include('admin.alert')
					</div>

	                <div class="col-12 col-md-4">
		                <h3 class="section-title">General Settings</h3>
						<div class="section-intro">Settings section intro goes here. Update General settings for company names and others details!</a></div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
								<div class="mb-3">
									<label for="setting-input-1" class="form-label">Business Name<span class="ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"  data-bs-placement="top" data-bs-content="Provide a bussiness name here."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
									<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
									<circle cx="8" cy="4.5" r="1"/>
									</svg></span></label>
									<input type="text" class="form-control" id="setting-input-1" value="{{$settings->b_name}}" name="b_name" required>
								</div>
								<div class="mb-3">
									<label for="setting-input-2" class="form-label">Contact Name</label>
									<input type="text" class="form-control" id="setting-input-2" value="{{$settings->b_phone}}" name="b_phone" required>
								</div>
								<div class="mb-3">
									<label for="setting-input-3" class="form-label">Business Email Address</label>
									<input type="email" class="form-control" id="setting-input-3" value="{{$settings->b_email}}" name="b_email" required>
								</div>
								<div class="mb-3">
									<label for="setting-input-3" class="form-label">Store Address</label>
									<textarea type="text" class="form-control" id="setting-input-4" name="b_address" requiredcols="30" rows="10">{{$settings->b_address}}</textarea>
								</div>
							</div><!--//app-card-body-->						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->

                <hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">About Us</h3>
		                <div class="section-intro">Settings section intro goes here. Update About us section here!</a></div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						<div class="app-card-body">
							<div class="mb-3">
								<label for="setting-input-1" class="form-label">About Title<span class="ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"  data-bs-placement="top" data-bs-content="Provide Information for about us page."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
								<circle cx="8" cy="4.5" r="1"/>
								</svg></span></label>
								<input type="text" class="form-control" id="setting-input-1" value="{{$settings->ab_title}}" name="ab_title" required>
							</div>
							<div class="mb-3">
								<label for="setting-input-2" class="form-label">Description</label>
								<textarea type="text" class="form-control" id="setting-input-2" required cols="30" rows="40" name="ab_desc">{{$settings->ab_desc}}</textarea>
							</div>
						</div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->

				<hr class="my-3">

				<div class="pb-5">
					<button type="submit" class="btn app-btn-primary float-end">Save Changes</button>
				</div>

				</form>

				<hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Account Settings</h3>
		                <div class="section-intro">Choose which account you want to use for collecting payments.</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">	
							<div class="card-header mb-5">
									<div class="col-md-12">
										<a href="{{route('settings/account/add')}}" class="btn btn-primary float-end text-white"><i class="fas fa-plus"></i>
										Add New
										Account</a>
								</div>
							</div><!-- card-header end  -->	
							<hr class="my-3">				    
						    <div class="app-card-body">
									@foreach($accSettings as $accSetting)
								    <div class="form-check form-switch mb-3">
										<div class="row">
											<div class="col-6">
											
											<form action="{{route('settings/account',$accSetting->id )}}" syle="display: none;"
												method="post" id="update-active-{{$accSetting->id}}">
												@csrf
												@method('POST')

												@if($accSetting->active == 'Yes')
												<input class="form-check-input" type="checkbox" checked onclick="event.preventDefault(); document.getElementById
												('update-active-{{$accSetting->id}}').submit();" name="active">
												@else
												<input class="form-check-input" type="checkbox" onclick="event.preventDefault(); document.getElementById
												('update-active-{{$accSetting->id}}').submit();" name="active">
												@endif
											</form>
											<ul>
												<li>
													<label class="form-check-label text-uppercase"><Strong>{{$accSetting->payment_type}}</Strong></label>
												</li>
												<li>
													<label class="form-check-label">{{$accSetting->ac_no}}</label>
												</li>
												<li>
													<label class="form-check-label">{{$accSetting->ac_name}}</label>
												</li>
												<li>
													<label class="form-check-label">{{$accSetting->ac_bank}}</label>
												</li>
											</ul>
											</div>
											<div class="col-4">
											<a href="{{route('settings/account/edit', $accSetting->id)}}" class="btn btn-outline-primary btn-sm float-end"><i class="fas fa-edit"></i></a>
											</div>
											<div class="col-2">
												<a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById
												('delete-form-{{$accSetting->id}}').submit();" class="btn btn-outline-danger btn-sm"><i
													class="fas fa-trash"></i></a>
													<form action="{{route('settings/account/delete', $accSetting->id)}}" syle="display: none;"
												method="post" id="delete-form-{{$accSetting->id}}">
												@csrf
												@method('DELETE')
											</form>
											</div>
										</div>
					
										<hr class="my-3">
									</div>
									@endforeach
						    </div><!--//app-card-body-->						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    <hr class="my-4">

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
		<footer class="app-footer">
		    @include('admin.footer.content')
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->  					

 
    <!-- Javascript -->          
	@include('admin.footer.assets')

</script>

</body>
</html>