@extends('admin.layout.app')

@section('content')

    @if (isAdmin())
        <div class="container-fluid pt-4 px-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-bottom rounded p-2">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('contacts.index')}}" class="btn btn-primary btn-sm me-2">
                                    <i class="fa fa-address-book fa-2x"></i>
                                </a>
                            </div>

                            <div class="ps-3">
                                <a href="{{route('contacts.index')}}">                                   
                                    <h3 class="">Contacts</h3>
                                    <h3 class="">{{$contacts}}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-bottom rounded p-2">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('projects.index')}}" class="btn btn-primary btn-sm me-2">
                                    <i class="fa fa-project-diagram fa-2x"></i>
                                </a>
                            </div>

                            <div class="ps-3">
                                <a href="{{route('projects.index')}}">                                   
                                    <h3 class="">Projects</h3>
                                    <h3 class="">{{$projects}}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-bottom rounded p-2">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('transections.index')}}" class="btn btn-primary btn-sm me-2">
                                    <i class="fa fa-exchange-alt fa-2x"></i>
                                </a>
                            </div>

                            <div class="ps-3">
                                <a href="{{route('transections.index')}}">                                   
                                    <h3 class="">Transections</h3>
                                    <h3 class="">{{$transections}}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (!isAdmin())
        <div class="container-fluid pt-4 px-4">            
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="h-100 rounded">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Assigned Projects <span>({{count($assignedProjects)}})</span></h6>                       
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="projectTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="min-width: 150px;">Title</th>
                                    <th style="min-width: 300px;">Details</th>   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedProjects as $index => $assignedProject)
                                    <tr class="align-middle">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $assignedProject->title }} <br>
                                            Status: {{ $assignedProject->status }} <br>
                                            <span class="text-info">Dateline: {{ \Carbon\Carbon::parse($assignedProject->date_line)->format('F j, Y, g:i A') }}</span> <br>
                                        </td>
                                        <td>
                                            <span class="text-info">{!! $assignedProject->details !!}</span>
                                        </td>    
                                        <td>
                                            <a href="{{ route('projects.show', $assignedProject->id) }}" class="btn btn-info btn-sm text-white my-1"><i class="fa fa-eye"></i></a>
                                        </td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @if (isAdmin())
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <div class="h-100 rounded">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">To Do List <span>({{count($todos)}})</span></h6>
                            <a href="{{route('todos.index')}}">Show All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="todoTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="min-width: 150px;">Title</th>
                                        <th style="min-width: 300px;">Details</th>                           
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $index => $todo)
                                        <tr class="align-middle">
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                {{ $todo->title }} <br>
                                                Status: {{ $todo->status }} <br>
                                                <span class="text-info">Time: {{ \Carbon\Carbon::parse($todo->time)->format('F j, Y, g:i A') }}</span> <br>
                                            </td>
                                            <td>
                                                @if ($todo->contact_id)
                                                    Contact Name: <a href="{{route('contacts.show', $todo->contact->id)}}">{{ $todo->contact->name }} </a><br>                                       
                                                    Contact Phone: {{ $todo->contact->phone_number }} <br>                                                               
                                                @endif
                                                
                                                @if ($todo->work_id)
                                                    Project Title: <a href="{{route('projects.show', $todo->work->id)}}">{{ $todo->work->title }}</a> <br> 
                                                    Project Status: {{ $todo->work->status }}  <br>                                    
                                                @endif
            
                                                <span class="text-info">{!! $todo->description !!}</span>
                                            </td>    
                                            
                                            
            
                                            <td class="text-center">
                                                <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm text-white my-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-success btn-sm my-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif    

            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="h-100 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                        {{-- <a href="">Show All</a> --}}
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            
        </div>
    </div>
@endsection    

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#todoTable').DataTable();
        });

        $(document).ready(function () {
            $('#projectTable').DataTable();
        });
    </script>
    
@endpush