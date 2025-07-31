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
            <h3>Add Transection</h3>

            <form action="{{ route('transections.store') }}" method="POST" class="mb-3">
                @csrf
                    
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" id="description" class="form-control border border-primary" placeholder="Enter transection description" value="{{ old('description') }}">
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount<span class="text-primary">*</span></label>
                                    <input type="text" name="amount" id="amount" class="form-control border border-primary"  value="{{ old('amount') }}">
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="work_id" class="form-label">Project<span class="text-primary">*</span></label>
                                    <select name="work_id" id="work_id" class="form-select border border-primary">
                                        <option value="">Select</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                                        @endforeach                                                    
                                    </select>
                                </div>
    
                                @error('work_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                                    <label for="date" class="form-label">Date</label>
                                    <input type="datetime-local" name="date" id="date" class="form-control border border-primary" value="{{ old('date') }}">
                                
                                    @error('date')
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

