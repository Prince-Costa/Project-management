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
                    <h3 class="text-primary text-center">Project</h3>
                    
                </div>
                <div class="card">
    
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Title:</strong> {{ $project->title }}</p>                      
                                    <p><strong>Status:</strong> {{ $project->status }}</p> 
                                    <p><strong>Contact:</strong>{{ $project->contact->name }}</p>                                                                         
                                    <p><strong>DateLine:</strong> {{ $project->date_line }}</p>                                               
                                    {{-- <p><strong>Assigned To:</strong> {{ $project->user->name }} </p>      --}}
                                    <p><strong>Domain:</strong> {{ $project->domain}}</p>                                   
                                </div>
                                
                                <div class="col-md-6">                      
                                    <p><strong>cpanel_url:</strong> {{ $project->cpanel_url }}</p>
                                    <p><strong>cpanel_user:</strong> {{ $project->cpanel_user }}</p>    
                                    <p><strong>cpanel_password:</strong> {{ $project->cpanel_password }}</p>    
                                    <p><strong>admin_panel_user:</strong> {{ $project->admin_panel_user }}</p>    
                                    <p><strong>admin_panel_password:</strong> {{ $project->admin_panel_password }}</p>    
                                    <p><strong>details:</strong> {{ $project->details }}</p>  
                                </div>  
                            </div>       
                    </div>
                </div>
                <div class="card-footer">                   
                    <div>
                        <div class="d-flex">
                         <h3 class="text-primary text-center">Projects Current Details</h3>                       
                     </div>

                    @forelse ($projectDetails as  $index => $projectDetail)
                    
                        
                        <div class="card-body border rounded-3 mb-3">
                            <span>{{$index +1 }}.</span>
                            <div class="row">
                                <!-- Column 1 -->
                                <div class="col-md-12">
                                    <p><strong>Title:</strong> {{ $projectDetail->title }}</p>
                                    
                                    
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

                    <div>
                        <div class="d-flex">
                            <h3 class="text-primary text-center">Payment Histry</h3>                       
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
                            @forelse ($transections as $payment)
                                <tr>
                                    <td>{{ $payment->description }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                    <td><a href="{{ route('transections.edit', $payment->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Payment Found</td>
                                </tr>
                            @endforelse
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
            </div>
        </div>
    </div>        
</div>






    <script>
        $(document).ready(() => {
            $('#details').summernote();
        });
        
        @foreach ($projectDetails as $projectDetail)
            $('#details{{ $projectDetail->id }}').summernote();
        @endforeach
    </script>
</body>
</html>
