@extends('dashboard.base')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Complaint</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('complaints.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="user" class="col-md-3 col-form-label">Complaint Type</label>
                                    <div class="col-md-9">
                                        <select name="user" id="user" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="">Type-1</option>
                                            <option value="">Type-2</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="address"> Address</label>
                                    <div class="col-md-9">
                                        <input class="form-control @error('address') is-invalid @enderror" id="address"
                                            type="text" name="address" placeholder="Enter Subject address" length="160"
                                            autocomplete="subject" autofocus required value="{{ old('address') }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="state">State</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="state" name="state">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}" @selected(old('state') == $state->id)>
                                                    {{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="district">District</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="district" name="district">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" @selected(old('district') == $district->id)>
                                                    {{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="block">Block</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="block" name="block">
                                            @foreach ($blocks as $block)
                                                <option value="{{ $block->id }}" @selected(old('block') == $block->id)>
                                                    {{ $block->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('block')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="department">Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="department" name="department">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" @selected(old('department') == $department->id)>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="subDepartment">Sub Department</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="subDepartment" name="subDepartment">
                                            @foreach ($subDepartments as $subDepartment)
                                                <option value="{{ $subDepartment->id }}" @selected(old('subDepartment') == $subDepartment->id)>
                                                    {{ $subDepartment->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subDepartment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="short_description">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="description">Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Add</button>
                                <a href="{{ route('complaints.index') }}" class="btn btn-primary">Return</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
