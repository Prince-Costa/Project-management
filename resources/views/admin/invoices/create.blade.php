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
            <h3>Add Invoice</h3>

            <form action="{{ route('invoices.store') }}" method="POST" class="mb-3">
                @csrf
                    
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="work_id" class="form-label">Project<span class="text-primary">*</span></label>
                                    <select name="work_id" id="work_id" class="form-select border border-primary">
                                        <option value="cash" selected>Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('work_id') == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>          
                                        @endforeach
                                              
                                    </select>
                                </div>
    
                                @error('work_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
@endpush

