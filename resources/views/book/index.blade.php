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
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Create Book</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Synopsis</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    {{-- coba tambah ini --}}
                    {{-- @php
                    $books = App\Models\Book::all();
                    @endphp --}}

                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->synopsis }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
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

{{-- <div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-10">
            <h4 class="mb-3">{{ $pageTitle }}</h4>
        </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Create Book</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Synopsis</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Book Title 1</td>
                    <td>Fiction</td>
                    <td>Author 1</td>
                    <td>Publisher 1</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('books.show', ['book' => 1]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                            <a href="{{ route('books.edit', ['book' => 1]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                            <div>
                                <form action="{{ route('books.destroy', ['book' => 1]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Book Title 2</td>
                    <td>Thriller</td>
                    <td>Author 2</td>
                    <td>Publisher 2</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('books.show', ['book' => 2]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                            <a href="{{ route('books.edit', ['book' => 2]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                            <div>
                                <form action="{{ route('books.destroy', ['book' => 2]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Book Title 3</td>
                    <td>Romance</td>
                    <td>Author 3</td>
                    <td>Publisher 3</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('books.show', ['book' => 3]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                            <a href="{{ route('books.edit', ['book' => 3]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                            <div>
                                <form action="{{ route('books.destroy', ['book' => 3]) }}" method="POST">
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
 --}}
