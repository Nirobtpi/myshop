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
                            <a class="btn btn-sm btn-primary" href="{{ route('category.add') }}">Add Category</a>
                        </div>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('category.check.del') }}" method="POST" id='submitform'>
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
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $cat)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="mb-3 form-check"> <input type="checkbox" name="deleteitems[]"
                                                    value="{{ $cat->id }}" class="form-check-input check"
                                                    id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>{{ $categories->firstitem() + $key }}</td>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>{{ $cat->category_slug }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success edit"
                                                data-id='{{ $cat->id }}' data-bs-toggle="modal"
                                                data-bs-target="#editModal"><i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a data-link="{{ route('category.delete', $cat->id) }}"
                                                class="btn btn-sm btn-danger delete"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-sm btn-danger del-btn d-none">Delete All</button>
                    </form>
                </div>

                {{ $categories->links('vendor.pagination.custom-pagination') }}



            </div> <!-- /.card -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.update') }}" method="POST">
                    <div class="modal-body">

                        @csrf
                        <div class="card-body">
                            <div class="mb-3"> <label for="category" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    placeholder="Category Name">
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="hidden" name="cat_id" id="cat_id">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary update-btn">Update Category</button>
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection

@push('js')
    <script>
        $('body').on('click', '.edit', function() {
            var cat_id = $(this).data('id');
            $.ajax({
                url: 'edit/' + cat_id,
                type: 'GET',
                success: function(response) {
                    console.log('Category Data:', response);
                    $('#category').val(response.category_name);
                    $('#cat_id').val(response.id);
                },
            })
        });
    </script>

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

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var link = $(this).attr('data-link');
                        window.location.href = link;
                    }
                })

            })
        });
    </script>
    @if (session('delete'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('delete') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Updated!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <script>
        $(".checkall").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
            $('.del-btn').toggleClass('d-none', !$('input:checkbox:checked').length);
        });

        $('.check').click(function() {
            $(".checkall").prop('checked', $('.check').length === $('.check:checked').length);
            $('.del-btn').toggleClass('d-none', !$('.check:checked').length);
        });

        $('.del-btn').click(function() {
            event.preventDefault()
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#submitform').submit();
                }
            })

        })
    </script>
@endpush
