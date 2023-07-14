<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pageTitle}}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <div class="container-sm mt-5">
        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Pinjam</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="borrower_name" class="form-label">Borrower Name</label>
                            <input type="text" class="form-control @error('borrower_name') is-invalid @enderror" name="borrower_name" id="borrower_name" value="{{ old('borrower_name') }}" placeholder="Enter Borrower Name">
                            @error('borrower_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="book_title" class="form-label">Book Title</label>
                            <input type="text" class="form-control @error('book_title') is-invalid @enderror" name="book_title" id="book_title" value="{{ old('book_title') }}" placeholder="Enter Book Title">
                            @error('book_title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" id="genre" value="{{ old('genre') }}" placeholder="Enter Genre">
                            @error('genre')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" placeholder="Enter Contact Number">
                            @error('contact_number')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="borrowed_date" class="form-label">Borrowed Date</label>
                            <input type="date" class="form-control @error('borrowed_date') is-invalid @enderror" name="borrowed_date" id="borrowed_date" value="{{ old('borrowed_date') }}">
                            @error('borrowed_date')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" id="return_date" value="{{ old('return_date') }}">
                            @error('return_date')
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
    @vite('resources/sass/app.scss')
</body>
</html>
