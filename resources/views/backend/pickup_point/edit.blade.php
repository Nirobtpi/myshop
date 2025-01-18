@extends('layouts.admin-app')
@section('Current_page', 'Add Pickup Point Update')
@section('title', 'Add Pickup Pointe Update')
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Add Pickup Point Update</div>
                </div>
                <form action="{{ route('pickuppoint.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="pickup_point_name" class="form-label">Pickup Point Name</label>
                            <input type="text" class="form-control" name="pickup_point_name"
                                value="{{ $data->pickup_point_name }}" id="pickup_point_name">
                            @error('pickup_point_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_address" class="form-label">pickup Point Address</label>
                            <input type="text" class="form-control" name="pickup_point_address"
                                value="{{ $data->pickup_point_address }}" id="pickup_point_address">
                            @error('pickup_point_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_phone" class="form-label">pickup Point Phone</label>
                            <input type="text" class="form-control" name="pickup_point_phone"
                                value="{{ $data->pickup_point_phone }}" id="pickup_point_phone">
                            @error('pickup_point_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pickup_point_phone_two" class="form-label">pickup Point Phone Two</label>
                            <input type="text" class="form-control" name="pickup_point_phone_two"
                                value="{{ $data->pickup_point_phone_two }}" id="pickup_point_phone_two">
                            @error('pickup_point_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update Pickup Point</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('js')
@endpush
