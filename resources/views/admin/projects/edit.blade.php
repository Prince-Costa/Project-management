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
            <h3>Edit Project</h3>

            <form action="{{ route('projects.update', $project->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title<span class="text-primary">*</span></label>
                            <input type="text" name="title" id="title" class="form-control border border-primary" placeholder="Enter work title" value="{{ old('title', $project->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_id" class="form-label">Contact<span class="text-primary">*</span></label>
                            <select name="contact_id" id="contact_id" class="form-select border border-primary">
                                <option value="">Select</option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ old('contact_id', $project->contact_id) == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
                                @endforeach                                                    
                            </select>
                        </div>

                        @error('contact_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select border border-primary">
                                @foreach (['Pending', 'Assigned', 'Planned', 'Started', 'In_Progress', 'Reviewing', 'Fixing_Issues', 'On_Hold', 'Canceled', 'Live', 'Maintenance', 'Completed'] as $status)
                                    <option value="{{ $status }}" {{ old('status', $project->status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Assign To Developer</label>
                            <select name="user_id" id="user_id" class="form-select border border-primary">
                                <option value="">Select</option>
                                @foreach ($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ old('user_id', $project->user_id) == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
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
                            <input type="text" name="total_charge" id="total_charge" class="form-control border border-primary" value="{{ old('total_charge', $project->total_charge) }}">
                            @error('total_charge')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="advance" class="form-label">Advance</label>
                            <input type="text" name="advance" id="advance" class="form-control border border-primary" value="{{ old('advance', $project->advance) }}">
                            @error('advance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date_line" class="form-label">Date Line</label>
                            <input type="datetime-local" name="date_line" id="date_line" class="form-control border border-primary"
                            value="{{ old('date_line', $project->date_line ? \Carbon\Carbon::parse($project->date_line)->format('Y-m-d\TH:i') : '') }}">
                            @error('date_line')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="domain" class="form-label">Domain</label>
                            <input type="text" name="domain" id="domain" class="form-control border border-primary" placeholder="Enter domain" value="{{ old('domain', $project->domain) }}">
                            @error('domain')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cpanel_url" class="form-label">CPanel URL</label>
                            <input type="text" name="cpanel_url" id="cpanel_url" class="form-control border border-primary" placeholder="Enter cPanel URL" value="{{ old('cpanel_url', $project->cpanel_url) }}">
                            @error('cpanel_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cpanel_user" class="form-label">CPanel User</label>
                            <input type="text" name="cpanel_user" id="cpanel_user" class="form-control border border-primary" placeholder="Enter cPanel user" value="{{ old('cpanel_user', $project->cpanel_user) }}">
                            @error('cpanel_user')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cpanel_password" class="form-label">CPanel Password</label>
                            <input type="text" name="cpanel_password" id="cpanel_password" class="form-control border border-primary" placeholder="Enter cPanel password" value="{{ old('cpanel_password', $project->cpanel_password) }}">
                            @error('cpanel_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="admin_panel_user" class="form-label">Admin Panel User</label>
                            <input type="text" name="admin_panel_user" id="admin_panel_user" class="form-control border border-primary" placeholder="Enter admin panel user" value="{{ old('admin_panel_user', $project->admin_panel_user) }}">
                            @error('admin_panel_user')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="admin_panel_password" class="form-label">Admin Panel Password</label>
                            <input type="text" name="admin_panel_password" id="admin_panel_password" class="form-control border border-primary" placeholder="Enter admin panel password" value="{{ old('admin_panel_password', $project->admin_panel_password) }}">
                            @error('admin_panel_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details" class="form-control border border-primary" rows="3" placeholder="Enter details">{{ old('details', $project->details) }}</textarea>
                            @error('details')
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#details').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
