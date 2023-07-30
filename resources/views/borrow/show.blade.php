@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Peminjaman</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="nama" class="form-label">Nama Peminjam</label>
                        <h5>{{ $borrow->name }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="title" class="form-label">Judul Buku</label>
                        <h5>{{ $borrow->book->title }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <h5>{{ $borrow->contact }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="borrowed_date" class="form-label">Borrowed Date</label>
                        <h5>{{ $borrow->borrowed_date }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <h5>{{ $borrow->return_date }}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
