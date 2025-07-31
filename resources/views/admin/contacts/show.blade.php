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
                    <h3 class="text-primary text-center">Contact Details</h3>
                    <div class="ms-auto">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                   </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-success"><i class="fa-solid fa-address-card"></i>&nbsp;{{$contact->name}}</h3>
                    </div>
                    <div class="card-body">
                        
                                <p><strong>Email:</strong> {{ $contact->email }}</p>                      
                                <p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>      
                                <p><strong>Whats App Number:</strong> {{ $contact->whats_app_number }}</p>       
                                <p><strong>Company:</strong> {{ $contact->company }}</p>  
                                <p><strong>Designation :</strong> {{ $contact->designetion }}</p>    
                                <p><strong>Address :</strong> {{ $contact->address }}</p>           
                    </div>
                </div>
                <div class="card-footer">
                    <h5 class="text-center text-primary">Project Details</h5>


                    @forelse ($contact->work as  $index => $work)
                    
                        <span>{{$index +1 }}.</span>
                        <div class="card-body">
                            <div class="row">
                                <!-- Column 1 -->
                                <div class="col-md-6 mb-3">
                                    <p><strong>Name:</strong> {{ $work->title }}</p>
                                    <p><strong>Status:</strong> {{ $work->status }}</p>
                                    <p><strong>Domain:</strong> {{ $work->domain }}</p>
                                    <p><strong>Cpanel Url:</strong> {{ $work->cpanel_url }}</p>
                                    <p><strong>Cpanel User:</strong> {{ $work->cpanel_user }}</p>                                  
                                </div>
                    
                                <!-- Column 2 -->
                                <div class="col-md-6 mb-3">    
                                    <p><strong>Cpanel Password:</strong> {{ $work->cpanel_password }}</p>
                                    <p><strong>Admin Panel User:</strong> {{ $work->admin_panel_user }}</p>
                                    <p><strong>Admin Panel Password:</strong> {{ $work->admin_panel_password }}</p>
                                    @if(isAdmin())
                                        <p class="text-info"><strong>Total Charge:</strong> {{ $work->total_charge }}</p>
                                        <p class="text-success"><strong>Total Paid:</strong> {{ $work->transections->sum('amount')}}</p>
                                        <p class="text-danger"><strong>Total Due:</strong> {{ $work->total_charge - $work->transections->sum('amount')}}</p>
                                    @endif
                                </div>
                            </div>               
                        </div>                       
                    @empty
                    <p class="text-center text-primary">No Work Found</p>
                    @endforelse ($contact->work as $index => $work)
                </div>
                </div>
            </div>
        </div>
    </div>        
</div>


@endsection
