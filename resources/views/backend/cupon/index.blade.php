@extends('layouts.admin-app')
@section('Current_page', 'Page Create')
@section('title', 'Page Create')
@push('css')
    <style>
        .dt-paging {
            display: none;
        }

        .dt-search {
            display: flex;
            justify-content: end;
            align-content: center;
            align-items: center;
            margin-top: 30px;

        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header row">
                    <div class="col-lg-6">
                        <h3 class="card-title">Cupon Code List</h3>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('cupon.add') }}">Add Cupon Code</a>
                    </div>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th style="width: 10px">SL No</th>
                                <th>Cupon Code</th>
                                <th>Valid Date</th>
                                <th>Type</th>
                                <th>Discount Ammount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cuponCodes as $key=>$cuponCode)
                                <tr class="align-middle">
                                    <td>{{ $cuponCods->firstitem() + $key }}</td>
                                    <td>{{ $cuponCode->cupon_code }}</td>
                                    <td>{{ $pagcuponCode->vailid_data }}</td>
                                    <td>{{ $pagcuponCode->type }}</td>
                                    <td>{{ $pagcuponCode->cupon_ammount }}</td>
                                    <td>{{ $pagcuponCode->status }}</td>
                                    <td>
                                        {{-- <a href="{{ route('page.edit', $cuponCode->id) }}" class="btn btn-sm btn-success
                                edit"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a data-link="{{ route('page.distroy', $cuponCode->id) }}"
                                    class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i></a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                    </table>
                    {{ $cuponCodes->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                dom: 'Bfrtip',
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
