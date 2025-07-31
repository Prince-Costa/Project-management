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
            <h3>Edit Todo</h3>

            <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')    
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title<span class="text-primary">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control border border-primary" placeholder="Enter title" value="{{ old('title', $todo->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="datetime-local" name="time" id="time" class="form-control border border-primary" placeholder="Enter time" value="{{ old('time', $todo->time) }}">
                                    @error('time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select border border-primary">
                                            <option value="normal" {{ old('status') || $todo->status == 'normal' ? 'selected' : '' }}>Normal</option>
                                            <option value="urgent" {{ old('status') || $todo->status == 'urgent' ? 'selected' : '' }}>Urgent</option>                                                  
                                        </select>
                                    </div>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <p>For</p>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_id" class="form-label">Contact</label>
                                    <select name="contact_id" id="contact_id" class="form-select border border-primary">
                                        <option value="" selected>Select Contact</option>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ old('contact_id') || $todo->contact_id == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>          
                                        @endforeach
                                              
                                    </select>
                                </div>
    
                                @error('contact_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>   
                                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="work_id" class="form-label">Project</label>
                                    <select name="work_id" id="work_id" class="form-select border border-primary">
                                        <option value="" selected>Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('work_id') || $todo->work_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>          
                                        @endforeach
                                              
                                    </select>
                                </div>
    
                                @error('work_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>     
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description<span class="text-primary">*</span></label>
                                    <textarea name="description" id="description" class="form-control border border-primary" placeholder="Enter description">{{ old('description', $todo->description) }}</textarea>
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
    
</script>
@endpush

