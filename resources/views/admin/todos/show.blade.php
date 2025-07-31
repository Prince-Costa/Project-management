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
                    <h3 class="text-primary text-center">Todo</h3>
                    <div class="ms-auto">
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                   </div>
                </div>
                <div class="card">
    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> {{ $todo->title }}</p>                      
                                <p><strong>Status:</strong> {{ $todo->status }}</p> 
                                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($todo->time)->format('F j, Y, g:i A') }}</p>
                                <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($todo->created_at)->format('F j, Y, g:i A') }}</p>
                            </div>    
                            
                            <div class="col-md-6">
                                @if ($todo->contact_id)
                                    <p><strong>Contact Name:</strong> <a href="{{route('contacts.show',$todo->contact->id)}}">{{ $todo->contact->name }}</a></p>
                                    <p><strong>Contact Phone:</strong> {{ $todo->contact->phone_number }}</p>
                                    <p><strong>Contact Email:</strong> {{ $todo->contact->email }}</p>
                                    <p><strong>Contact Company:</strong> {{ $todo->contact->company }}</p>
                                @endif

                                @if ($todo->work_id)
                                    <p><strong>Project Title:</strong><a href="{{route('projects.show',$todo->work->id)}}">{{ $todo->work->title }}</a> </p>    
                                    <p><strong>Project Status:</strong> {{ $todo->work->status }}</p>             
                                @endif                            
                            </div>  

                            <div class="col-md-12">
                                <p><strong>Description:</strong>{!! $todo->description !!}</p>  
                            </div>
                        </div>       
                    </div>               
                </div>
            </div>
        </div>
    </div>        
</div>


@endsection

