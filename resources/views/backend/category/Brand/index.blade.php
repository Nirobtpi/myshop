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
                    <form action="{{ route('brand.checkDelete') }}" method="POST" id='submitform'>
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
                                        <td><img width="100px" src="{{ asset('uploads/brands') }}/{{ $brand->brand_logo }}"
                                                alt=""></td>
                                        <td>
                                            <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-sm btn-success edit"><i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a data-link="{{ route('brand.distroy', $brand->id) }}"
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
    @if (session('update'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('update') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script>
        $(document).ready(function(){

            $(".checkall").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
                $('.del-btn').toggleClass('d-none', !$('input:checkbox:checked').length);
            });

            $('.check').click(function() {
                $(".checkall").prop('checked', $('.check').length === $('.check:checked').length);
                $('.del-btn').toggleClass('d-none', !$('.check:checked').length);
            });

            $('.delete').on('click', function() {
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
                        let link = $(this).attr('data-link');
                        // console.log(link);
                        
                        window.location.href=link;
                    }
                    });
            })

        
            $('.del-btn').on('click',function(){
                event.preventDefault();
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

        })
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
@endpush
