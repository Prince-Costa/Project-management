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

            <h3 class="">Settings</h3>

            <form action="{{ route('settings.update',$settings->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="app_name" class="form-label">Site Name</label>
                        <input type="text" class="form-control border border-primary" id="app_name" name="app_name" value="{{ old('app_name', $settings->app_name ?? '') }}">

                        @error('app_name')
                            <div class="text-danger">{{ $message }}</div>          
                        @enderror
                    </div>
    
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Site Logo</label>
                                    <input type="file" class="form-control border border-primary" id="logo" name="logo" accept="image/*">                 
                                </div>

                                @error('logo')
                                    <div class="text-danger">{{ $message }}</div>          
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">                          
                                    @if(isset($settings->logo))
                                        <img src="{{ asset($settings->logo) }}" alt="logo" class="mt-2" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Site Email</label>
                        <input type="email" class="form-control border border-primary" id="email" name="email" value="{{ old('email', $settings->email ?? '') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>          
                        @enderror
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Site Phone</label>
                        <input type="text" class="form-control border border-primary" id="phone" name="site_phone" value="{{ old('phone', $settings->phone ?? '') }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>          
                        @enderror
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control border border-primary" id="address" name="address" rows="3">{{ old('address', $settings->address ?? '') }}</textarea>
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control border border-primary" id="facebook" name="facebook" value="{{ old('facebook', $settings->facebook ?? '') }}">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control border border-primary" id="twitter" name="twitter" value="{{ old('twitter', $settings->twitter ?? '') }}">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control border border-primary" id="instagram" name="instagram" value="{{ old('instagram', $settings->instagram ?? '') }}">
                    </div>
    
    
                    <div class="col-md-6 mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control border border-primary" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin ?? '') }}">
                    </div>
    
    
                    <div class="col-md-6 mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control border border-primary" id="youtube" name="youtube" value="{{ old('youtube', $settings->youtube ?? '') }}">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp" class="form-label">Whatsapp</label>
                        <input type="text" class="form-control border border-primary" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp ?? '') }}">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="google" class="form-label">Google</label>
                        <input type="text" class="form-control border border-primary" id="google" name="google" value="{{ old('google', $settings->google ?? '') }}">
                    </div>
    
    
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control border border-primary" id="description" name="description" >{{ old('description', $settings->description ?? '') }}</textarea>
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="owner_name" class="form-label">Owner Name</label>
                        <input type="text" class="form-control border border-primary" id="owner_name" name="owner_name" value="{{ old('owner_name', $settings->owner_name ?? '') }}">
                    </div>
    
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sign" class="form-label">Owner Sign</label>
                                    <input type="file" class="form-control border border-primary" id="sign" name="sign" accept="image/*">                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">                          
                                    @if(isset($settings->sign))
                                        <img src="{{ asset($settings->sign) }}" alt="sign" class="mt-2" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
           
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#description').summernote({
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
