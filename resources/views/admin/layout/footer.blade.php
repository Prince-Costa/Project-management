@php
    $settings = \App\Models\Setting::first();  
@endphp

<!-- Footer Start -->
<div class="container-fluid pt-3 px-3">
    <div class="bg-secondary rounded-top p-3">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy;{{ $settings->app_name}} All Right Reserved. 
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                Designed & Developed By <a href="https://rigglotech.com">Rigglotech</a>               
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->