@extends('layouts.app')
@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('borrows.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-secondary-subtle rounded-3 border col-xl-8">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Create Pinjam</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="mb-3">
                        <label for="name" class="form-label">Borrower Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Borrower Name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" value="{{ old('contact') }}" placeholder="Enter Contact Number">
                        @error('contact')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Book</label>
                        <select class="form-select select2 @error('book_id') is-invalid @enderror" name="book_id" id="book_id">
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->code.' - '.$book->title }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="borrowed_date" class="form-label">Borrowed Date</label>
                        <input type="date" class="form-control @error('borrowed_date') is-invalid @enderror" name="borrowed_date" id="borrowed_date" value="{{ old('borrowed_date') }}">
                        @error('borrowed_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" id="return_date" value="{{ old('return_date', now()->addDays(7)->format('Y-m-d')) }}" readonly>
                        @error('return_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File Identitas</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">
                        @error('file')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('borrows.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"> Cancel</i></a>
                    </div>
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"> Save</i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

