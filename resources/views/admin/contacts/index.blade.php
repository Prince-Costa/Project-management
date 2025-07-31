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

            <h3 class="">Contacts</h3>

            <div class="table-responsive">
                <table class="table table-striped" id="contactsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width: 150px;">Name</th>
                            <th style="min-width: 300px;">Details</th>
                            <th style="min-width: 200px;">Company</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $index => $contact)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>
                                    Email: {{ $contact->email }} <br>
                                    Phone Number: {{ $contact->phone_number }} <br>
                                    Whats app: {{ $contact->whats_app_number }} <br>
                                    Address: {{ $contact->address }} <br>                               
                                </td>

                                <td>
                                    Company: {{ $contact->company }} <br>
                                    Designetion: {{ $contact->designetion }} <br>                                                              
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm my-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-success btn-sm my-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
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
            $('#contactsTable').DataTable();
        });
    </script>
    
@endpush