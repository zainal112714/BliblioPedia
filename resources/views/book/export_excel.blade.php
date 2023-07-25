<table>
    <thead>
        <tr>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Sinopsis</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>

                <td>{{ $book->code }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->synopsis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
