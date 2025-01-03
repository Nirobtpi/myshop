@extends('layouts.admin-app')
@section('Current_page', 'Update Brand')
@section('title', 'Update Brand')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Update Brand Name</div>
                </div>
                <form action="{{ route('brand.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="brand_name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" value="{{ $data->brand_name }}" name="brand_name"
                                id="brand_name">
                            @error('brand_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="brand_logo" class="form-label">Brand Logo</label>
                            <input type="file"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="brand_logo" class="form-control" id="brand_logo">
                            @error('brand_logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mt-2">
                                <img id="blah" width="100px"
                                    src="{{ asset('uploads/brands') }}/{{ $data->brand_logo }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update Brand</button> </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        $('#brand_logo').dropify();
    </script>
@endpush
