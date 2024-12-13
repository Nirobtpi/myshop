@extends('layouts.admin-app')
@section('title', 'Category Index')
@section('Current_page', 'Category')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a class="btn btn-sm btn-primary" href="">Add Category</a>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $cat)
                                <tr class="align-middle">
                                    <td>{{ $categories->firstitem() + $key }}</td>
                                    <td>{{ $cat->category_name }}</td>
                                    <td>{{ $cat->category_slug }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="" class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div> <!-- /.card-body -->

                {{ $categories->links('vendor.pagination.custom-pagination') }}

            </div> <!-- /.card -->
        </div>
    </div>
@endsection
