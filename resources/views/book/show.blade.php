@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Book</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <h5>{{ $book->title }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="genre" class="form-label">Gendre</label>
                        <h5>{{ $book->genre }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="author" class="form-label">Author</label>
                        <h5>{{ $book->author }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <h5>{{ $book->publisher }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <h5>{{ $book->synopsis }}</h5>
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

