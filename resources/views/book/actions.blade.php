<div class="d-flex">
    <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
