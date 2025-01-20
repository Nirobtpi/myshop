{{-- @foreach ($pr as $p)
    @php
        $data = json_decode($p->tags, true);
    @endphp

        @foreach ($data as $item)
            <span class="badge bg-primary">{{ $item['value'] }}</span>
        @endforeach

@endforeach --}}
@extends('layouts.admin-app')
@section('title', "All Products")
@section('Current_page', "All Products")
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
            </div> <!-- /.card-header -->
            <div class="card-body">
                <table id="data" class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th style="width: 10px">SL No</th>
                            <th>Pickup Point Name</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Child Category</th>
                            <th>Brand</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            <th>Discount Price</th>
                            <th>Stock Quantity</th>
                            <th>Warehouse Name</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                            <tr class="align-middle">
                                <td>{{ $products->firstitem() + $key }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->categories->category_name }}</td>
                                <td>{{ $product->subCategories->name }}</td>
                                <td>{{ $product->childCategories->name }}</td>
                                <td>{{ $product->brands->brand_name }}</td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->stock_quentity }}</td>
                                <td>{{ $product->wareHouses->warehouse_name }}</td>

                                {{-- <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success
                                    edit"><i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a data-link="{{ route('product.distroy', $product->id) }}"
                                        class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No Data Found</td>
                            </tr>
                        @endforelse
                </table>
                {{ $products->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            $('.delete').on('click', function () {
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
