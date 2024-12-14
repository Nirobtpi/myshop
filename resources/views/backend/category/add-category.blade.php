@extends('layouts.admin-app')
@section('title', 'Categiry Add')
@section('Current_page', 'Category Add')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Category Add Form</div>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3"> <label for="category" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Category Name">
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Add Category</button> </div>
                </form>
            </div>
        </div>
    </div>
@endsection
