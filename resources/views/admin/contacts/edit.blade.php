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
            <h3>Edit Contact</h3>

            <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-primary">*</span></label>
                            <input type="text" name="name" id="name" class="form-control border border-primary" required placeholder="Enter Name" value="{{ old('name', $contact->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>    

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone<span class="text-primary">*</span></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control border border-primary" required placeholder="Enter phone number" value="{{ old('phone_number', $contact->phone_number) }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control border border-primary" required placeholder="Enter email" value="{{ old('email', $contact->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>    
     

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="whats_app_number" class="form-label">Whats App Number</label>
                            <input type="text" name="whats_app_number" id="whats_app_number" class="form-control border border-primary" placeholder="Enter whatsapp number" value="{{ old('whats_app_number', $contact->whats_app_number) }}">
                            @error('whats_app_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" name="company" id="company" class="form-control border border-primary" placeholder="Enter company name" value="{{ old('company', $contact->company) }}">
                            @error('company')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="designetion" class="form-label">Designetion In Company</label>
                            <input type="text" name="designetion" id="designetion" class="form-control border border-primary" placeholder="Enter designetion" value="{{ old('designetion', $contact->designetion) }}">
                            @error('designetion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control border border-primary" rows="3" placeholder="Enter Address">{{ old('address', $contact->address) }}</textarea>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>       
    </div>
@endsection
