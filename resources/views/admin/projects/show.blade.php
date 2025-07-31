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
                    <h3 class="text-primary text-center">Project</h3>
                    <div class="ms-auto">
                        <a href="{{ route('project_share', $project->id) }}" target="blank" class="btn btn-success text-white my-1">
                            <i class="fa fa-share"></i>
                        </a>
                        @if (isAdmin())
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        @endif
                   </div>
                </div>
                <div class="card">
    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> {{ $project->title }}</p>                      
                                <p><strong>Status:</strong> {{ $project->status }}</p> 
                                @if (isAdmin())
                                    <p><strong>Contact:</strong>  <a href="{{route('contacts.show', $project->contact->id)}}"> {{ $project->contact->name }}</a></p> 
                                    <p><strong>Total Charge:</strong> {{ $project->total_charge }}</p>       
                                    <p><strong>Advance:</strong> {{ $project->advance }}</p> 
                                @endif     
                                
                                <p><strong>DateLine:</strong> {{ $project->date_line }}</p>                                               
                                <p><strong>Assigned To:</strong> <a href="{{route('users.show', $project->user->id)}}">{{ $project->user->name }}</a> </p>                                       
                            </div>
                            
                            <div class="col-md-6">
                                <p><strong>Domain:</strong> {{ $project->domain}}</p>   
                                <p><strong>cpanel_url:</strong> {{ $project->cpanel_url }}</p>
                                <p><strong>cpanel_user:</strong> {{ $project->cpanel_user }}</p>    
                                <p><strong>cpanel_password:</strong> {{ $project->cpanel_password }}</p>    
                                <p><strong>admin_panel_user:</strong> {{ $project->admin_panel_user }}</p>    
                                <p><strong>admin_panel_password:</strong> {{ $project->admin_panel_password }}</p>                                       
                            </div>  

                            <div class="col-md-12">
                                <p><strong>Details:</strong> {!!$project->details !!}</p>  
                            </div>
                        </div>       
                    </div>
                    @if (isAdmin())
                    <div class="card-footer">                   
                        <div>
                            <div class="d-flex">
                             <h3 class="text-primary text-center">Payment Histry</h3>
                             <div class="ms-auto">
                                <a class="btn btn-primary" href="{{ route('transections.create') }}">
                                    <i class="fa fa-plus me-2"></i>Add Payment
                                </a>
                             </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transections as $payment)
                                    <tr>
                                        <td>{{ $payment->description }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                        <td><a href="{{ route('transections.edit', $payment->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th class="text-end"><strong>Total</strong></th>
                                    <th><strong>{{$transectionTotal}}</strong></th>
                                    <th class="text-end"><strong>Due</strong></th>

                                    <th><strong>{{ $project->total_charge - $transectionTotal }}</strong></th>
                                </tr>
                            </thead>
                        
                        </table>
                    </div>
                    @endif
                </div>
                <div class="card-footer">                   
                    <div>
                        <div class="d-flex">
                         <h3 class="text-primary text-center">Projects Current Details</h3>
                         <div class="ms-auto">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDetailsModal">
                                <i class="fa fa-plus me-2"></i>Add Current Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addDetailsModal" tabindex="-1" aria-labelledby="addDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addDetailsModalLabel">Add Projects Current Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('project.details.store', $project->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title<span class="text-primary">*</span></label>
                                                    <input type="text" class="form-control border border-primary" id="title" name="title" required>
                                                </div>

                                                

                                                <div class="mb-3">
                                                    <label for="details" class="form-label">Details<span class="text-primary">*</span></label>
                                                    <textarea class="form-control border border-primary" id="details" name="details" rows="3" required></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="screenshort" class="form-label">Screen Short</label>
                                                    <input type="file" class="form-control border border-primary" id="screenshort" name="screenshort">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

                    @forelse ($projectDetails as  $index => $projectDetail)
                    
                        
                        <div class="card-body border rounded-3 mb-3">
                            <span>{{$index +1 }}.</span>
                            <div class="row">
                                <!-- Column 1 -->
                                <div class="col-md-12">
                                    <p><strong>Title:</strong> {{ $projectDetail->title }}</p>
                                    <div class="d-flex justify-content-start">
                                        <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editDetailsModal{{ $projectDetail->id }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>

                                        <form action="{{ route('project.details.destroy', ['project' => $project->id, 'detail' => $projectDetail->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this detail?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editDetailsModal{{ $projectDetail->id }}" tabindex="-1" aria-labelledby="editDetailsModalLabel{{ $projectDetail->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDetailsModalLabel{{ $projectDetail->id }}">Edit Project Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('project.details.update', ['project' => $project->id, 'detail' => $projectDetail->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="title{{ $projectDetail->id }}" class="form-label">Title<span class="text-primary">*</span></label>
                                                            <input type="text" class="form-control border border-primary" id="title{{ $projectDetail->id }}" name="title" value="{{ $projectDetail->title }}" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="details{{ $projectDetail->id }}" class="form-label">Details<span class="text-primary">*</span></label>
                                                            <textarea class="form-control border border-primary" id="details{{ $projectDetail->id }}" name="details" rows="3" required>{{ $projectDetail->details }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="screenshort{{ $projectDetail->id }}" class="form-label">Screen Short</label>
                                                            <input type="file" class="form-control border border-primary" id="screenshort{{ $projectDetail->id }}" name="screenshort">
                                                            @if ($projectDetail->screenshort)
                                                                <small class="text-muted">Current: {{ $projectDetail->screenshort }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($projectDetail->screenshort)
                                    <div class="text-center">
                                        <img src="{{ asset('project_details/' . $projectDetail->screenshort) }}" alt="Screen Short" class="img-fluid mb-3">
                                    </div>                                        
                                    @endif
                                    <p><strong>Details:</strong> {!! $projectDetail->details !!}</p>                                                                  
                                </div>                  
                            </div>               
                        </div>                       
                    @empty
                    <p class="text-center text-primary">No Details Found</p>
                    @endforelse ($project->work as $index => $work)
                </div>
                </div>
            </div>
        </div>
    </div>        
</div>


@endsection


@push('scripts')
    <script>
        $(document).ready(() => {
            $('#details').summernote();
        });
        
        @foreach ($projectDetails as $projectDetail)
            $('#details{{ $projectDetail->id }}').summernote();
        @endforeach
    </script>
@endpush
