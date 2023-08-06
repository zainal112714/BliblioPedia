@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-10">
                    <h4 class="mb-3">{{ $pageTitle }}</h4>
                </div>
                <div class="col-lg-6 col-xl-12">
                    <ul class="list-inline mb-0 float-end">
                        <li class="list-inline-item">
                            <a href="{{ route('books.exportExcel') }}" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('books.exportPdf') }}" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i>to PDF
                            </a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="{{ route('books.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Make Loan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="table-responsive border p-3 rounded-3">
                <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="bookTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No.</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Sinopsis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        {{-- @stack('scripts') --}}
        <script type="module">
            $(document).ready(function() {
                $('#bookTable').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: "/getBooks",
                    columns: [{
                            data: "id",
                            name: "id",
                            visible: false
                        },
                        {
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'code',
                            name: 'code'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'genre',
                            name: 'genre'
                        },
                        {
                            data: 'author',
                            name: 'author'
                        },
                        {
                            data: 'publisher',
                            name: 'publisher'
                        },
                        {
                            data: 'synopsis',
                            name: 'synopsis'
                        },
                        {
                            data: "actions",
                            name: "actions",
                            orderable: false,
                            searchable: false
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 25, 100, 'ALL'],
                    ],
                });
                $(".datatable").on("click", ".btn-delete", function(e) {
                    e.preventDefault();

                    var form = $(this).closest("form");
                    var name = $(this).data("name");

                    Swal.fire({
                        title: "Anda yakin akan menghapus data\n" + name + "?",
                        text: "Anda tidak dapat mengembalikan data setelah menghapus data!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "bg-primary",
                        confirmButtonText: "Hapus",
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
