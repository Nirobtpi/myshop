@extends('layouts.admin-app')
@section('Current_list', 'Ware House')
@section('title', 'Ware House')

@section('content')
    @push('css')
        <style>
            .dt-paging {
                display: none;
            }
        </style>
    @endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header row">
                    <div class="col-lg-6">
                        <h3 class="card-title">Ware House List</h3>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('warehouse.create') }}">Add Warehouse</a>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">SL No</th>
                                <th>Ware House Name</th>
                                <th>Ware House Address</th>
                                <th>Ware House Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lists as $key=>$list)
                                <tr class="align-middle">
                                    <td>{{ $lists->firstitem() + $key }}</td>
                                    <td>{{ $list->warehouse_name }}</td>
                                    <td>{{ $list->warehouse_address }}</td>
                                    <td>{{ $list->warehouse_phone != "" ? "$list->warehouse_phone":"Null"  }}</td>
                                    <td>
                                        <a href="{{ route('warehouse.edit', $list->id) }}" class="btn btn-sm btn-success edit"><i
                                                class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a data-link="{{ route('warehouse.distroy', $list->id) }}"
                                            class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                    </table>
                    {{ $lists->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                dom: 'Bfrtip', // Enable Buttons with Filter, Table, Pagination
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            $('.delete').on('click', function() {
                let data = $(this).attr('data-link');

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
                        window.location.href = data;
                    }
                });
            })

        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (session('distroy'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('distroy') }}",
                icon: "success"
            });
        </script>
    @endif
@endpush

@endsection
