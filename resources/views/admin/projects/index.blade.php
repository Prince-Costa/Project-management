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

            <h3 class="">Projects</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="projectTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 150px;">Name</th>
                            <th style="min-width: 300px;">Details</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $index => $project)
                            {{-- @if (isAdmin() || auth()->user()->id == $project->user_id) --}}
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project->title }}</td>
                                <td>
                                    Domain: {{ $project->domain }} <br>
                                    Cpanel Url: {{ $project->cpanel_url }} <br>   
                                    @if(isAdmin())                               
                                    Contact Name: {{ $project->contact->name }} <br>
                                    @endif
                                    Assigned To: {{ $project->user->name }} <br>
                                    Dateline: {{ \Carbon\Carbon::parse($project->date_line)->format('d M Y') }} <br>
                                </td>
                                <td>{{ $project->status }}</td>
                                

                                <td class="text-center">
                                    <a href="{{ route('project_share', $project->id) }}" target="blank" class="btn btn-success btn-sm text-white my-1">
                                        <i class="fa fa-share"></i>
                                    </a>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm text-white my-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if (isAdmin())
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-success btn-sm my-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this contact?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            {{-- @endif --}}
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
            $('#projectTable').DataTable();
        });
    </script>
    
@endpush