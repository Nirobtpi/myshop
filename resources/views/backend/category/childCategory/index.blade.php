@extends('layouts.admin-app')
@section('Current_page', 'Child Category')
@section('title', 'Chile Category')
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
                            <a class="btn btn-sm btn-primary" href="{{ route('subcategory.add') }}">Add sub_category</a>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    {{-- <form action="" method="POST" id='submitform'> --}}
                        @csrf
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    {{-- <td>
                                        <div class="mb-3 form-check"> <input type="checkbox"
                                                class="form-check-input checkall" id="exampleCheck1"> <label
                                                class="form-check-label" for="exampleCheck1">Select All</label> </div>
                                    </td> --}}
                                    <th>Sl No</th>
                                    <th>Child Category Name</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-sm btn-danger del-btn d-none">Delete All</button>
                    </form>
                </div>

                {{-- {{ $subcategories->links('vendor.pagination.custom-pagination') }} --}}



            </div> <!-- /.card -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        
        $(document).ready(function() {

            function childCategory() {
                let table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: `{{ route('childcategory.index') }}`,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'Child Category Name',
                            name: 'Child Category Name'
                        },
                        {
                            data: 'Category Name',
                            name: 'Category Name'
                        },
                        {
                            data: 'Sub Category Name',
                            name: 'Sub Category Name'
                        },
                        {
                            data: 'Action',
                            name: 'Action',
                            orderable: true,
                            searchable: true
                        },
                    ],
                });
            };
            childCategory()
        });
    </script>
@endpush
