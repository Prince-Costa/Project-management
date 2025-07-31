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
            <h3>Add Contact</h3>

            <form action="{{ route('contacts.store') }}" method="POST" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-primary">*</span></label>
                            <input type="text" name="name" id="name" class="form-control border border-primary" required placeholder="Enter Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>    

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone<span class="text-primary">*</span></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control border border-primary" required placeholder="Enter phone number" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control border border-primary" required placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>    
     

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="whats_app_number" class="form-label">Whats App Number</label>
                            <input type="text" name="whats_app_number" id="whats_app_number" class="form-control border border-primary" placeholder="Enter whatsapp number" value="{{ old('whats_app_number') }}">
                            @error('whats_app_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" name="company" id="company" class="form-control border border-primary" placeholder="Enter company name" value="{{ old('company') }}">
                            @error('company')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="designetion" class="form-label">Designetion In Company</label>
                            <input type="text" name="designetion" id="designetion" class="form-control border border-primary" placeholder="Enter designetion" value="{{ old('designetion') }}">
                            @error('designetion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control border border-primary" rows="3" placeholder="Enter Address">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <h3 class="text-center">Project</h3>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="" id="addWorkDetails" name="work" value="true">
                                <label class="form-check-label" for="addWorkDetails">Add Project<span class="text-danger"> (If not don't check)</span></label>
                            </div>
                        </div>
                    </div>
                    
                    <div id="workDetailsSection" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control border border-primary" placeholder="Enter work title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select border border-primary">
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Assigned">Assinged to developer</option>
                                        <option value="Planned">Planned</option>
                                        <option value="Started">Started</option>
                                        <option value="In_Progress">In Progress</option>
                                        <option value="Reviewing">Reviewing</option>
                                        <option value="Fixing_Issues">Fixing Issues</option>
                                        <option value="On_Hold">On Hold</option>
                                        <option value="Canceled">Canceled</option>
                                        <option value="Live">Live</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Completed">Completed</option>                        
                                    </select>
                                </div>
    
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Assigne To Developer</label>
                                    <select name="user_id" id="user_id" class="form-select border border-primary">
                                        <option value="">Select</option>
                                        @foreach ($developers as $developer)
                                            <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                        @endforeach                                                    
                                    </select>
                                </div>
    
                                @error('user_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="total_charge" class="form-label">Total Charge</label>
                                    <input type="text" name="total_charge" id="total_charge" class="form-control border border-primary"  value="{{ old('total_charge') }}">
                                    @error('total_charge')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="advance" class="form-label">Advance</label>
                                    <input type="text" name="advance" id="advance" class="form-control border border-primary" value="{{ old('advance') }}">
                                    @error('advance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <select name="payment_type" id="payment_type" class="form-select border border-primary">
                                        <option value="cash" selected>Cash</option>
                                        <option value="mobile_banking">Mobile Banking</option>
                                        <option value="credit">Credit Card</option>
                                        <option value="debit">Debit Card</option>                        
                                    </select>
                                </div>
    
                                @error('payment_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tansection_number" class="form-label">Tansection Number</label>
                                    <input type="text" name="tansection_number" id="tansection_number" class="form-control border border-primary" value="{{ old('tansection_number') }}">                                  
                                </div>
                                @error('tansection_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_line" class="form-label">Date Line</label>
                                    <input type="datetime-local" name="date_line" id="date_line" class="form-control border border-primary" value="{{ old('date_line') }}">
                                
                                    @error('date_line')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="domain" class="form-label">Domain</label>
                                    <input type="text" name="domain" id="domain" class="form-control border border-primary" placeholder="Enter domain" value="{{ old('domain') }}">
                                    @error('domain')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cpanel_url" class="form-label">CPanel URL</label>
                                    <input type="text" name="cpanel_url" id="cpanel_url" class="form-control border border-primary" placeholder="Enter cPanel URL" value="{{ old('cpanel_url') }}">
                                    @error('cpanel_url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cpanel_user" class="form-label">CPanel User</label>
                                    <input type="text" name="cpanel_user" id="cpanel_user" class="form-control border border-primary" placeholder="Enter cPanel user" value="{{ old('cpanel_user') }}">
                                    @error('cpanel_user')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cpanel_password" class="form-label">CPanel Password</label>
                                    <input type="text" name="cpanel_password" id="cpanel_password" class="form-control border border-primary" placeholder="Enter cPanel password" value="{{ old('cpanel_password') }}">
                                    @error('cpanel_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admin_panel_user" class="form-label">Admin Panel User</label>
                                    <input type="text" name="admin_panel_user" id="admin_panel_user" class="form-control border border-primary" placeholder="Enter admin panel user" value="{{ old('admin_panel_user') }}">
                                    @error('admin_panel_user')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admin_panel_password" class="form-label">Admin Panel Password</label>
                                    <input type="text" name="admin_panel_password" id="admin_panel_password" class="form-control border border-primary" placeholder="Enter admin panel password" value="{{ old('admin_panel_password') }}">
                                    @error('admin_panel_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="details" class="form-label">Details</label>
                                    <textarea name="details" id="details" class="form-control border border-primary" rows="3" placeholder="Enter details">{{ old('details') }}</textarea>
                                    @error('details')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
    document.getElementById('addWorkDetails').addEventListener('change', function () {
        const workDetailsSection = document.getElementById('workDetailsSection');
        if (this.checked) {
            workDetailsSection.style.display = 'block';
        } else {
            workDetailsSection.style.display = 'none';
        }
    });
</script>
@endpush
