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

            <h3 class="">Project Dues</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="duesTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 300px;">Details</th>
                            <th style="min-width: 300px;">Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transections as $index => $transection)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">Total Charge: </div>
                                        <div class="col-md-9">{{ $transection->work->total_charge }} </div>

                                        <div class="col-md-3">Receved: </div>
                                        <div class="col-md-9">{{ $transection->total_paid }} </div>

                                        <div class="col-md-3">Due: </div>
                                        <div class="col-md-9"><span class="text-danger">{{ $transection->total_due }}</span> </div>
                                    </div>                                                                                                                                                                 
                                </td>    
                                
                                <td>
                                <a href="{{route('projects.show', $transection->work->id)}}">{{ $transection->work->title }} </a><br>                                                   
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
            $('#duesTable').DataTable();
        });
    </script>
    
@endpush