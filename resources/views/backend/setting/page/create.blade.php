@extends('layouts.admin-app')
@section('title', 'Page Add')
@section('Current_page', 'Page Add')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Page Add Form</div>
                </div>
                <form action="{{ route('page.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3"> <label for="page_position" class="form-label">Page Position</label>
                            <select class="form-control" name="page_position" id="page_position">
                                <option>Select Postion</option>
                                <option value="1">Line One</option>
                                <option value="2">Line Two</option>
                            </select>

                        </div>
                        <div class="mb-3"> <label for="page_name" class="form-label">Page Name</label>
                            <input type="text" class="form-control" id="page_name" name="page_name"
                                placeholder="Page Name">
                            @error('page_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3"> <label for="page_title" class="form-label">Page Title</label>
                            <input type="text" class="form-control" id="page_title" name="page_title"
                                placeholder="Page Title">
                            @error('page_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="page_description" class="form-label">Page Description</label>
                            <textarea class="form-control" name="page_description" id="page_description"></textarea>
                            @error('page_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Create Page</button> </div>
                </form>
            </div>
        </div>
    @endsection
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#page_description').summernote({
                    height: 200,
                });
            });
        </script>
    @endpush
