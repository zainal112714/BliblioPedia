@extends('layouts.app')
@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-secondary-subtle rounded-3 border col-xl-8">
                <div class="mb-3 text-center">
                    <i class="bi-book fs-1"></i>
                    <h4>Create Book</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" value="" placeholder="Enter Code">
                        @error('code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select @error('genre') is-invalid @enderror" name="genre" id="genre" value="{{ old('genre') }}">
                            <option value="">Select Genre</option>
                            <option value="Novel">Novel</option>
                            <option value="Fiksi Ilmiah">Fiksi Ilmiah</option>
                            <option value="Fantasi">Fantasi</option>
                            <option value="Misteri">Misteri</option>
                            <option value="Drama">Drama</option>
                            <option value="Puisi">Puisi</option>
                            <option value="Cerita Pendek">Cerita Pendek</option>
                            <option value="Biografi">Biografi</option>
                            <option value="Ensiklopedia">Ensiklopedia</option>
                            <option value="Buku Anak-Anak">Buku Anak-Anak</option>
                            <!-- Tambahkan genre lainnya sesuai dengan daftar genre yang Anda inginkan -->
                        </select>
                        @error('genre')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') }}" placeholder="Enter Author">
                        @error('author')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" id="publisher" value="{{ old('publisher') }}" placeholder="Enter Publisher">
                        @error('publisher')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" id="synopsis" rows="4" placeholder="Enter Synopsis">{{ old('synopsis') }}</textarea>
                        @error('synopsis')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="d-grid">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"> Cancel</i></a>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"> Save</i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
