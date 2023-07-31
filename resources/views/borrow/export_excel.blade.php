<table>
    <thead>
        <tr>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Genre</th>
            <th>Kontak</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows as $borrow)
            <tr>
                <td>{{ $borrow->name }}</td>
                <td>{{ $borrow->book->code }} - {{ $borrow->book->title }} </td>
                <td>{{ $borrow->book->genre }}</td>
                <td>{{ $borrow->contact }}</td>
                <td>{{ $borrow->borrowed_date }}</td>
                <td>{{ $borrow->return_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
