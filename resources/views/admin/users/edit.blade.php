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
        <div class="col-lg-12">
            <h3>Edit User</h3>

            <form action="{{ route('users.update', $user->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" class="form-control border border-primary" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control border border-primary" value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                    <input type="text" id="phone" name="phone" class="form-control border border-primary" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" id="address" name="address" class="form-control border border-primary" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">{{ __('Role') }}</label>
                    <select id="role" name="role" class="form-control border border-primary">
                        <option value=""  selected>{{ __('Select Role') }}</option>
                        
                        <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>
                            Admin
                        </option>

                        <option value="developer" {{$user->role == 'developer' ? 'selected' : ''}}>
                            Developer
                        </option>
                        
                    </select>
                    @error('role')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                

   

                <button type="submit" class="btn btn-primary mt-3">
                    {{ __('Save') }}
                </button>
            </form>
        </div>        
    </div>
@endsection