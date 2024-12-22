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
                            <h3 class="card-title">Child Category Table</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addData"
                                href="#">Add
                                Child Category</a>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    {{-- <form action="" method="POST" id='submitform'> --}}
                    @csrf
                    <table class="table table-bordered" id="nirob">
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
                            @foreach ($childCategory as $cat)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->category->category_name }}</td>
                                    <td>{{ $cat->subcategory->name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success edit" data-id='{{ $cat->id }}'
                                            data-bs-toggle="modal" data-bs-target="#editData"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a data-link="" class="btn btn-sm btn-danger delete"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <button type="submit" class="btn btn-sm btn-danger del-btn d-none">Delete All</button>
                    </form> --}}
                </div>

                {{-- {{ $subcategories->links('vendor.pagination.custom-pagination') }} --}}
            </div> <!-- /.card -->
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add Child Category</div>
                        </div>
                        <form class="needs-validation" id="childcat">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="category_name" class="form-label">Category</label>
                                        <select class="form-select" id="category_name" name="category_name">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="sub_category_name" class="form-label">Sub Category</label>
                                        <select class="form-select" id="sub_category_name" name="sub_category_name">

                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="child_category_name" class="form-label">Child Category Name</label>
                                        <input type="text" class="form-control" id="child_category_name"
                                            name="child_category_name">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"> <button class="btn btn-info" type="submit">Add Child
                                    Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal  --}}
    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add Child Category</div>
                        </div>
                        <form class="needs-validation" id="editchildcat">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="edit_category_name" class="form-label">Category</label>
                                        <select class="form-select" id="edit_category_name" name="category_name">


                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="edit_sub_category_name" class="form-label">Sub Category</label>
                                        <select class="form-select" id="edit_sub_category_name"
                                            name="edit_sub_category_name">

                                        </select>
                                    </div>
                                    <input type="hidden" name="id" id="editId">
                                    <div class="col-md-12">
                                        <label for="edit_child_category_name" class="form-label">Child Category
                                            Name</label>
                                        <input type="text" class="form-control" id="edit_child_category_name"
                                            name="edit_child_category_name">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"> <button class="btn btn-info update" type="submit">Edit Child
                                    Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#category_name').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: `subcategory-list/${id}`,
                    type: "GET",
                    success: function(response) {
                        const select = $('#sub_category_name');
                        select.empty();
                        select.append('<option>Choose Sub Category');
                        response.data.forEach(subcategory => {
                            select.append(
                                `<option value="${subcategory.id}">${subcategory.name}</option>`
                            )
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr)
                    }
                });
            });

            $('#childcat').on('submit', function() {
                event.preventDefault();
                let formdata = $(this).serialize();
                $.ajax({
                    url: '{{ route('childcategory.store') }}',
                    type: 'POST',
                    data: formdata,
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "(response.data)",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#childcat')[0].reset();
                        $('#addData').modal('hide');
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }

                });
            });

            function allcategory(id) {
                $.ajax({
                    type: 'GET',
                    url: `{{ route('category.all') }}`,
                    success: function(response) {
                        const select = $('#edit_category_name');
                        select.empty();
                        select.append('<option>choose Category</option>');
                        response.data.forEach(cat => {
                            const isSelected = cat.id === id ? 'selected' :
                                '';
                            select.append(
                                `<option value='${cat.id}' ${isSelected}>${cat.category_name}</option>`
                            );
                        });
                    },
                    error: function(xhr) {

                    }
                });
            }

            $('.edit').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `edit/${id}`,
                    success: function(response) {
                        // console.log(response.data.category_id);
                        $('#edit_child_category_name').val(response.data.name)
                        $('#editId').val(response.data.id)
                        allcategory(response.data.category_id);
                        allsubcategory(response.data.subcategory_id)
                        //    console.log(a)
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });

            function allsubcategory(id) {
                $.ajax({
                    type: 'GET',
                    url: `{{ route('subcategory.get.all') }}`,
                    success: function(response) {

                        const editselect = $('#edit_sub_category_name');
                        editselect.empty();
                        editselect.append('<option>choose Category</option>');
                        // editselect.prop('disabled', true);
                        response.data.forEach(subcat => {
                            const isSelected = subcat.id === id ? 'selected' :
                                '';
                            editselect.append(
                                `'<option value='${subcat.id}' ${isSelected} >${subcat.name}</option>'`
                            );
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            }

            $('#edit_category_name').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: `subcategory-list/${id}`,
                    type: "GET",
                    success: function(response) {
                        const select = $('#edit_sub_category_name');
                        select.empty();
                        select.append('<option>Choose Sub Category');
                        console.log(response.data);
                        // $('#edit_sub_category_name').prop('disabled', false);
                        response.data.forEach(subcategory => {
                            select.append(
                                `<option value="${subcategory.id}">${subcategory.name}</option>`
                            )
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr)
                    }
                });
            });
            
            $('#editchildcat').on('submit', function() {
                event.preventDefault();
                let formdata = $(this).serialize();
                // $('#edit_sub_category_name').prop('disabled', false);
                $.ajax({
                    type: "POST",
                    url: "{{ route('childcategory.update') }}",
                    data: formdata,
                    
                    success: function(response) {

                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: `${response.data}`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function(xhr) {
                        console.error("Error occurred:", xhr.responseText);
                    }
                });
            });


            allcategory()
            allsubcategory()
        });
    </script>
@endpush
