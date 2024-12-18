@extends('layouts.admin-app')
@section('title', 'Subcategiry Add')
@section('Current_page', 'Subcategory Add')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Sub Category Add Form</div>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach ($categories as $category)
                                        <option>{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                        </div>
                        </div>
                        <div class="mb-3"> <label for="category" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Sub Category Name">
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Add Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection