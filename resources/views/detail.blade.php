<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .gambar-buku {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
        }

        .judul {
            margin-top: 20px;
            color: #333;
        }

        .pengarang {
            color: #666;
        }

        .sinopsis {
            color: #444;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Simulasi data buku (untuk contoh)
        $gambar = "gambar_buku.jpg";
        $pengarang = "John Doe";
        $judul = "Buku Fantastis";
        $sinopsis = "Ini adalah sinopsis buku yang menarik dan seru. Buku ini pasti akan membuat Anda terpaku hingga halaman terakhir.";
        ?>

        <img class="gambar-buku" src="<?php echo $gambar; ?>" alt="Gambar Buku">
        <h1 class="judul"><?php echo $judul; ?></h1>
        <p class="pengarang">Pengarang: <?php echo $pengarang; ?></p>
        <p class="sinopsis"><?php echo $sinopsis; ?></p>
    </div>
</body>
</html>
