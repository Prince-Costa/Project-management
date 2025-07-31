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
            <h3>Add Quote</h3>

            <form action="{{ route('quotations.store') }}" method="POST" class="mb-3">
                @csrf
                    
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title<span class="text-primary">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control border border-primary" placeholder="Enter title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_id" class="form-label">Contact</label>
                                    <select name="contact_id" id="contact_id" class="form-select border border-primary">
                                        <option value="cash" selected>Select Contact</option>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ old('contact_id') == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>          
                                        @endforeach
                                              
                                    </select>
                                </div>
    
                                @error('contact_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>   
                                    

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name<span class="text-primary">*</span></label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control border border-primary" placeholder="Enter Customer Name" value="{{ old('customer_name') }}">
                                    @error('customer_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_phone" class="form-label">Customer Phone<span class="text-primary">*</span></label>
                                    <input type="text" name="customer_phone" id="customer_phone" class="form-control border border-primary" placeholder="Enter customer phone" value="{{ old('customer_phone') }}">
                                    @error('customer_phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_email" class="form-label">Customer Email</label>
                                    <input type="text" name="customer_email" id="customer_email" class="form-control border border-primary" placeholder="Enter Customer email" value="{{ old('customer_email') }}">
                                    @error('customer_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_company" class="form-label">Customer Company</label>
                                    <input type="text" name="customer_company" id="customer_company" class="form-control border border-primary" placeholder="Enter Customer company" value="{{ old('customer_company') }}">
                                    @error('customer_company')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="customer_address" class="form-label">Customer Address</label>
                                    <input type="text" name="customer_address" id="customer_address" class="form-control border border-primary" placeholder="Enter Customer address" value="{{ old('customer_address') }}">
                                    @error('customer_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" name="description" id="description" class="form-control border border-primary" placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>                                  
                        </div>                       
                    </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>       
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>

<script>
    const contacts = @json($contacts);

    document.getElementById('contact_id').addEventListener('change', function() {
        const selectedId = this.value;

        // Find the selected contact from the contacts array
        const selectedContact = contacts.find(contact => contact.id == selectedId);

        if (selectedContact) {
            document.getElementById('customer_name').value = selectedContact.name || '';
            document.getElementById('customer_phone').value = selectedContact.phone_number || '';
            document.getElementById('customer_email').value = selectedContact.email || '';
            document.getElementById('customer_company').value = selectedContact.company + ' (' + selectedContact.designetion + ')' || '';
            document.getElementById('customer_address').value = selectedContact.address || '';
        } else {
            // Clear fields if no contact is selected
            document.getElementById('customer_name').value = '';
            document.getElementById('customer_phone').value = '';
            document.getElementById('customer_email').value = '';
            document.getElementById('customer_company').value = '';
            document.getElementById('customer_address').value = '';
        }
    });
</script>
@endpush

