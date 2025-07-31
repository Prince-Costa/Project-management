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

            <h3 class="">Todos</h3>

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
                                        <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this todo?')">
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#todoTable').DataTable();
        });
    </script>
    
@endpush