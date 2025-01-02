@extends('layouts.admin-app')
@section('Current_page', 'Brand')
@section('title', 'Brand')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="card-title">Brand Table</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a class="btn btn-sm btn-primary" href="{{ route('brand.add') }}">Add brand</a>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <form action="" method="POST" id='submitform'>
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>
                                        <div class="mb-3 form-check"> <input type="checkbox"
                                                class="form-check-input checkall" id="exampleCheck1"> <label
                                                class="form-check-label" for="exampleCheck1">Select All</label> </div>
                                    </td>
                                    <th>Sl No</th>
                                    <th>Brand Name</th>
                                    <th>Brand Slug</th>
                                    <th>Brand Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="mb-3 form-check"> <input type="checkbox" name="deleteitems[]"
                                                    value="{{ $brand->id }}" class="form-check-input check"
                                                    id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>{{ $brands->firstitem() + $key }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->brand_slug }}</td>
                                        <td><img width="100px" src="{{ asset('uploads/brands') }}/{{ $brand->brand_logo }}" alt=""></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success edit"
                                                data-id='{{ $brand->id }}' data-bs-toggle="modal"
                                                data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a data-link="" class="btn btn-sm btn-danger delete"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-sm btn-danger del-btn d-none">Delete All</button>
                    </form>
                </div>

                {{ $brands->links('vendor.pagination.custom-pagination') }}



            </div> <!-- /.card -->
        </div>
    </div>

@endsection

@push('js')
    @if (session('store'))
        <script>
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('store') }}",
            showConfirmButton: false,
            timer: 1500
        });
        </script>
    @endif
@endpush
