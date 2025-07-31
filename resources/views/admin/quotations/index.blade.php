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

            <h3 class="">Quotations</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="quoteTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 150px;">Title</th>
                            <th style="min-width: 300px;">Customer Details</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $index => $quote)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $quote->title }}</td>
                                <td>
                                    Name: {{ $quote->customer_name }} <br>
                                    Email: {{ $quote->customer_email }} <br>   
                                    Phone: {{ $quote->customer_phone }} <br>                          
                                    Company: {{ $quote->customer_company }}                                                                                                            
                                </td>    
                                
                                

                                <td class="text-center">
                                    <a href="{{ route('quotation_share', $quote->id) }}" target="blank" class="btn btn-success btn-sm text-white my-1">
                                        <i class="fa fa-share"></i>
                                    </a>
                                    <a href="{{ route('quotations.show', $quote->id) }}" class="btn btn-info btn-sm text-white my-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('quotations.edit', $quote->id) }}" class="btn btn-success btn-sm my-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('quotations.destroy', $quote->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this quotation?')">
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
            $('#quoteTable').DataTable();
        });
    </script>
    
@endpush