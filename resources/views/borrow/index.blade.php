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
                            <a href="{{ route('borrows.exportExcels') }}" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i>to Excel
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('borrows.exportPdfs') }}" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i>to PDF
                            </a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="{{ route('borrows.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i>Make Loan
                            </a>`
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="table-responsive border p-3 rounded-3">
                <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="borrowTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No.</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Genre</th>
                            <th>Contact Number</th>
                            <th>Borrowed Date</th>
                            <th>Return Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    <script type="module">
        $(document).ready ( function () {
            $('#borrowTable').DataTable( {
                serverSide: true,
                processing: true,
                ajax: '/getBorrows',
                columns: [
                    { data: "id", name: "id", visible: false },
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    {
                        data: null,
                        name: 'book_id',
                        render: function (data, type, row) {
                            return data.book.code + ' - ' + data.book.title;
                        },
                    },
                    { data: 'genre', name: 'genre' },
                    { data: 'contact', name: 'contact' },
                    { data: 'borrowed_date', name: 'borrowed_date' },
                    { data: 'return_date', name: 'return_date' },
                    { data: "actions", name: "actions", orderable: false, searchable: false },
                ],
                order: [[0, 'desc']],
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

