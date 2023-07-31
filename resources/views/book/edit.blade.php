@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row justify-content-center">
                        <div class="p-5 bg-light rounded-3 col-xl-6">
                            <div class="mb-3 text-center">
                                <i class="bi-person-circle fs-1"></i>
                                <h4>Edit Book</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ $errors->any() ? old('code') : $book->code }}" placeholder="Enter Code">
                                    @error('code')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ $errors->any() ? old('title') : $book->title }}" placeholder="Enter Title">
                                    @error('title')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <select class="form-select @error('genre') is-invalid @enderror" name="genre" id="genre">
                                        <option value="{{$book->genre}}">{{$book->genre }}</option>
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
                                <div class="col-md-6 mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input class="form-control @error('author') is-invalid @enderror" type="text" name="author" id="author" value="{{ $errors->any() ? old('author') : $book->author }}">
                                    @error('author')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="publisher" class="form-label">Publisher</label>
                                    <input type="publisher" class="form-control @error('publisher') is-invalid @enderror" name="publisher" id="publisher" value="{{ $errors->any() ? old('publisher') : $book->publisher }}" placeholder="Enter Publisher">
                                    @error('publisher')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="synopsis" class="form-label">Synopsis</label>
                                    <textarea name="synopsis" id="synopsis" cols="52" rows="10">{{ $errors->any() ? old('synopsis') : $book->synopsis }}</textarea>
                                    {{-- <input class="form-control @error('synopsis') is-invalid @enderror" type="text" name="synopsis" id="synopsis" value="{{ $errors->any() ? old('synopsis') : $book->synopsis }}" placeholder="Enter Synopsis"> --}}
                                    @error('synopsis')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('books.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
@endsection
