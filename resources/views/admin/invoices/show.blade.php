@extends('admin.layout.app')


@section('content')
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
                    <h3 class="text-primary text-center">Invoice</h3>
                    <div class="ms-auto">
                        <a href="{{ route('invoice_share', $invoice->id) }}" target="blank" class="btn btn-success text-white my-1">
                            <i class="fa fa-share"></i>
                        </a>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                   </div>
                </div>
                <div class="card">
    
                    <div class="card-body p-0">
                        <div style="height:50px; width:100%; background:blue;"></div>
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
                        
                        <div style="height:80px; width:100%; background:blue;"></div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>        
</div>


@endsection

