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
                        <th>Borrower Name</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Contact Number</th>
                        <th>Borrowed Date</th>
                        <th>Return Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Book Title 1</td>
                        <td>Fiction</td>
                        <td>1234567890</td>
                        <td>2023-07-15</td>
                        <td>2023-07-22</td>
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
                    <tr>
                        <td>Jane Smith</td>
                        <td>Book Title 2</td>
                        <td>Thriller</td>
                        <td>9876543210</td>
                        <td>2023-07-16</td>
                        <td>2023-07-23</td>
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
                    <tr>
                        <td>Michael Johnson</td>
                        <td>Book Title 3</td>
                        <td>Romance</td>
                        <td>4567890123</td>
                        <td>2023-07-17</td>
                        <td>2023-07-24</td>
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
                </tbody>
            </table>
        </div>
    </div>

    @vite('resources/sass/app.scss')
</div>
@endsection
