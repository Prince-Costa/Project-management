<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Managemant</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
        
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    
    
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
        <style>
            @media print {
                div {
                    -webkit-print-color-adjust: exact; /* Chrome, Safari */
                    print-color-adjust: exact; /* Modern browsers */
                }

                .row {
                    display: flex !important;
                    flex-wrap: wrap !important;
                }
                .col-md-6, 
                [class*="col-md-6"] {
                    flex: 1 0 0% !important;
                    max-width: 100% !important;
                }
            }
        </style>
    </head>
<body>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mx-0 mt-3">
        <div class="col-md-12">

            <div class="card mt-4">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="ms-auto">
                            <button class="btn btn-primary" onclick="printScreen()">Print</button>
                        </div>
                    </div>
                </div>
                <div class="card" id="printableArea">   
                    <div class="card-body p-0">
                        {{-- <div style="height:50px; width:100%; background:blue;"></div> --}}
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="d-flex p-3">
                                    <div class="">
                                        <img src="{{asset($settings->logo)}}" alt="logo" style="width: 100px; height: 100px;">
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="text-dark">{{$settings->app_name}}</h4>
                                        <p class="text-dark mb-0">{{$settings->address}}</p>
                                        <p class="text-dark mb-0">{{$settings->phone}}</p>
                                        <p class="text-dark mb-0">{{$settings->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex p-3">
                                    <div class="ms-auto text-end">
                                        <h4 class="text-dark">Invoice</h4>
                                        <p class="text-dark mb-0">Date: {{ $invoice->created_at->format('d-m-Y') }}</p>
                                        <p class="text-dark mb-0">Invoice No: {{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</p>                                       
                                    </div>
                                </div>
                            </div>    
                        </div>
    
                        <div class="row p-3">                          
                            <div class="col-md-12 bg-light p-3">
                                <h5 class="text-dark">Bill To..</h5>
                                <h6 class="text-dark mb-0">{{$invoice->contact->name}}</h6>
                                <p class="text-dark mb-0">{{$invoice->contact->address}}</p>
                                <p class="text-dark mb-0">{{$invoice->contact->phone}}</p>
                                <p class="text-dark mb-0">{{$invoice->contact->email}}</p>
                            </div>  

                            <div class="col-md-12">
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $invoice->work->title }}</td>
                                            <td>1</td>  
                                            <td>1 x {{$invoice->work->total_charge}}</td>                                          
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="text-end">Total:</td>
                                            <td>{{$invoice->work->total_charge}}</td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                            <div class="col-md-12">
                                <p>{!!$invoice->description !!}</p>  
                            </div>

                            <div class="col-md-12">
                                <p>{!!$settings->description !!}</p>  
                            </div>

                            <p>Thank you for choosing us...</p>

                            <p>Sign Of Charman: 
                                <span style="border-bottom:1px dashed  black;">
                                    @if ($settings->sign)
                                    <img src="{{ asset($settings->sign) }}" alt="Signature" style="height: 12px;">                                     
                                    @endif
                                </span>
                            </p>
                        </div>   
                        
                        {{-- <div style="height:80px; width:100%; background:blue;"></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>

<script>
    function printScreen() {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
    
        document.body.innerHTML = printContents;
    
        window.print();
    
        document.body.innerHTML = originalContents;
        location.reload(); // Reload the page to restore the original content
    }
</script>

</body>
</html>
