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
                    <h3 class="text-primary text-center">User Details</h3>
                    <div class="ms-auto">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                   </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-success"><i class="fa-solid fa-address-card"></i>&nbsp;{{$user->name}}</h3>
                    </div>
                    <div class="card-body">                      
                        <p><strong>Email:</strong> {{ $user->email }}</p>                      
                        <p><strong>Phone Number:</strong> {{ $user->phone }}</p>      
                        <p><strong>Role:</strong> {{ $user->role }}</p>      
                        <p><strong>Address:</strong> {{ $user->address }}</p>                                             
                    </div>
                </div>

                @if ($user->role != 'admin')
                    <div class="card-footer">
                    <h5 class="text-center text-primary">Projects</h5>

                    @forelse ($user->work as  $index => $work)                                       
                        <div class="card-body border p-3 rounded-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span>{{$index +1 }}.</span>
                                </div>
                                <div>
                                    <a href="{{ route('projects.show', $work->id) }}" class="btn btn-success btn-sm me-2"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('projects.edit', $work->id) }}" class="btn btn-info btn-sm me-2"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Column 1 -->
                                <div class="col-md-6 mb-3">
                                    <p><strong>Name:</strong> {{ $work->title }}</p>
                                    <p><strong>Status:</strong> {{ $work->status }}</p>
                                    <p><strong>Domain:</strong> {{ $work->domain }}</p>
                                    <p><strong>Cpanel Url:</strong> {{ $work->cpanel_url }}</p>                                                                    
                                </div>
                    
                                <!-- Column 2 -->
                                <div class="col-md-6 mb-3">    
                                    <p><strong>Cpanel User:</strong> {{ $work->cpanel_user }}</p> 
                                    <p><strong>Cpanel Password:</strong> {{ $work->cpanel_password }}</p>
                                    <p><strong>Admin Panel User:</strong> {{ $work->admin_panel_user }}</p>
                                    <p><strong>Admin Panel Password:</strong> {{ $work->admin_panel_password }}</p>                                 
                                </div>
                            </div>               
                        </div>                       
                    @empty
                    <p class="text-center text-primary">No Work Found</p>
                    @endforelse ($contact->work as $index => $work)
                </div>
                @endif
            </div>
        </div>
    </div>        
</div>


@endsection
