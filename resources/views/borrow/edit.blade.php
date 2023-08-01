@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('borrows.update', ['borrow' => $borrow->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <form action="{{ route('borrows.update', ['borrow' => $borrow->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row justify-content-center">
                        <div class="p-5 bg-light rounded-3 col-xl-6">
                            <div class="mb-3 text-center">
                                <i class="bi-person-circle fs-1"></i>
                                <h4>Edit Load</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Borrower Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $errors->any() ? old('name') : $borrow->name }}" placeholder="Enter Borrower Name">
                                    @error('name')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" id="contact" value="{{ $errors->any() ? old('contact') : $borrow->contact }}" placeholder="Enter Contact">
                                    @error('contact')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Book</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ $errors->any() ? old('title') : $borrow->book->title }}" placeholder="Select Book">
                                    @error('title')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="borrowed_date" class="form-label">Borrowed Date</label>
                                    <input class="form-control @error('borrowed_date') is-invalid @enderror" type="date" name="borrowed_date" id="borrowed_date" value="{{ old('borrowed_date') }}">
                                    @error('borrowed_date')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="return_date" class="form-label">Return Date</label>
                                    <input type="date" class="form-control @error('return_date') is-invalid @enderror" name="return_date" id="return_date" value="{{ old('return_date', now()->addDays(7)->format('Y-m-d')) }}" readonly>
                                    @error('return_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Script to calculate and set the return_date -->
                                <script>
                                    document.getElementById("borrowed_date").addEventListener("change", function() {
                                        const borrowedDate = new Date(this.value);
                                        borrowedDate.setDate(borrowedDate.getDate() + 7);
                                        document.getElementById("return_date").value = borrowedDate.toISOString().split("T")[0];
                                    });
                                </script>


                                <div class="col-md-12 mb-3">
                        <label for="age" class="form-label">Kartu Identitas</label>
                        @if ($borrow->original_file)
                            <h5>{{ $borrow->original_file }}</h5>
                            <a href="{{ route('borrows.downloadFile', ['borrowId' => $borrow->id]) }}" class="btn btn-primary btn-sm mt-2">
                                <i class="bi bi-download me-1"></i> Download Identitaas
                            </a>
                        @else
                            <h5>Tidak ada</h5>
                        @endif
                    </div>
                            </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('borrows.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
