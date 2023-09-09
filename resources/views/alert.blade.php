@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session()->get('warning')}}
</div>
@endif