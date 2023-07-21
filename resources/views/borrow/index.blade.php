@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('borrows.create') }}" class="btn btn-primary">Create Pinjam</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Genre</th>
                        <th>Kontak</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $borrow)
                            <tr>
                                <td>{{ $borrow->name }}</td>
                                <td>{{ $borrow->book->code }} - {{ $borrow->book->title }} </td>
                                <td>{{ $borrow->book->genre }}</td>
                                <td>{{ $borrow->contact }}</td>
                                <td>{{ $borrow->borrowed_date }}</td>
                                <td>{{ $borrow->return_date }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                                        <a href="" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                        <div>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/sass/app.scss')
</div>
@endsection
