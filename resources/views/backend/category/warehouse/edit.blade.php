@extends('layouts.admin-app')
@section('title', 'Warehouse Add')
@section('Current_page', 'Warehouse Add')
@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Warehouse Update Form</div>
                </div>
                <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="mb-3"> <label for="warehouse_name" class="form-label">Ware House Name</label>
                            <input type="text" class="form-control" id="warehouse_name"
                                value="{{ $warehouse->warehouse_name }}" name="warehouse_name" placeholder="warehouse Name">
                            @error('warehouse_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3"> <label for="warehouse_address" class="form-label">Ware House Address</label>
                            <input type="text" class="form-control" value="{{ $warehouse->warehouse_address }}"
                                id="warehouse_address" name="warehouse_address" placeholder="warehouse address">
                            @error('warehouse_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3"> <label for="warehouse_phone" class="form-label">Ware House Phone</label>
                            <input type="text" class="form-control" value="{{ $warehouse->warehouse_phone }}"
                                id="warehouse_phone" name="warehouse_phone" placeholder="warehouse phone">
                            @error('warehouse_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update Warehouse</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @push('js')
    @endpush
