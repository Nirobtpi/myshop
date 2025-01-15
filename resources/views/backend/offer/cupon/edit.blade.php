@extends('layouts.admin-app')
@section('Current_page', 'Update Cupon Code')
@section('title', 'Update Cupon Code')
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Update Cupon Code</div>
                </div>
                <form action="{{ route('cupon.update',$data->id) }}" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cupon_code" class="form-label">Cupone Code</label>
                            <input type="text" class="form-control" name="cupon_code" value="{{ $data->cupon_code }}"
                                id="cupon_code">
                            @error('cupon_code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="valid_date" class="form-label">Valide Date</label>
                            <input type="date" class="form-control" value="{{ $data->valid_date }}" name="valid_date"
                                id="valid_date">
                            @error('valid_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Cupon Type</label>
                            <select name="type" id="type" class="form-control">
                                <option selected>Select One....</option>
                                <option {{ $data->type == 1 ? 'selected' : '' }} value="1">Fixed</option>
                                <option {{ $data->type == 2 ? 'selected' : '' }} value="2">Percentage</option>
                            </select>
                            @error('vailid_data')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cupon_ammount" class="form-label">Cupon Ammount</label>
                            <input type="text" value="{{ $data->cupon_ammount }}" class="form-control"
                                name="cupon_ammount" id="cupon_ammount">
                            @error('cupon_ammount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected>Select One....</option>
                                <option {{ $data->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Active</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Add Cupon Code</button> </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('js')
@endpush
