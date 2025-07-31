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

            <h3 class="">Transections</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="transectionTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 150px;">Description</th>
                            <th style="min-width: 300px;">Details</th>
                            <th style="min-width: 300px;">Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transections as $index => $transection)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transection->description }}</td>
                                <td>
                                    Amount: {{ $transection->amount }} <br>
                                    Transection Type: {{ $transection->type }} <br>   
                                    Payment Type: {{ $transection->payment_type }} <br>                          
                                    Transection Number: {{ $transection->tansection_number }} <br>     
                                    Date: {{ \Carbon\Carbon::parse($transection->date)->format('d M Y') }} <br>                                                                       
                                </td>    
                                
                                <td>
                                    Project: {{ $transection->work->title }} <br>                  
                                    Contact Name: {{ $transection->contact->name }} <br>                              
                                    Assigned To: {{ $transection->work->user->name }} <br> 
                                </td>
                                

                                <td class="text-center">
                                    {{-- <a href="{{ route('project_share', $project->id) }}" target="blank" class="btn btn-success btn-sm text-white my-1">
                                        <i class="fa fa-share"></i>
                                    </a> --}}
                                    {{-- <a href="{{ route('transections.show', $transection->id) }}" class="btn btn-info btn-sm text-white my-1">
                                        <i class="fa fa-eye"></i>
                                    </a> --}}
                                    <a href="{{ route('transections.edit', $transection->id) }}" class="btn btn-success btn-sm my-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('transections.destroy', $transection->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this contact?')">
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
            $('#transectionTable').DataTable();
        });
    </script>
    
@endpush