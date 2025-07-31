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

            <h3 class="">Invoices</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="invoiceTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 150px;">Title</th>
                            <th style="min-width: 300px;">Customer Details</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $index => $invoice)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $invoice->work->title }}</td>
                                <td>
                                    Name: {{ $invoice->contact->name }} <br>
                                    Email: {{ $invoice->contact->email }} <br>   
                                    Phone: {{ $invoice->contact->phone }} <br>                          
                                    Company: {{ $invoice->contact->company }}                                                                                                            
                                </td>    
                                
                                

                                <td class="text-center">
                                    <a href="{{ route('invoice_share', $invoice->id) }}" target="blank" class="btn btn-success btn-sm text-white my-1">
                                        <i class="fa fa-share"></i>
                                    </a>
                                    <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm text-white my-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success btn-sm my-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: inline-block;">
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#invoiceTable').DataTable();
        });
    </script>
    
@endpush