<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Peminjaman</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>List Peminjaman</h1>
    <table class="table table-bordered">
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
</body>
</html>
