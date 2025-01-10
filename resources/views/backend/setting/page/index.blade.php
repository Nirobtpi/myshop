@extends('layouts.admin-app')
@section('Current_page', 'Page Create')
@section('title', 'Page Create')
@push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.jqueryui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.4.3/css/scroller.jqueryui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                </div> <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">SL No</th>
                                <th>Page Name</th>
                                <th>Page Title</th>
                                <th>Page Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>1.</td>
                                <td>Update software</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge text-bg-danger">55%</span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.jqueryui.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.4.3/js/scroller.jqueryui.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                dom: 'Bfrtip', // Enable Buttons with Filter, Table, Pagination
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush
