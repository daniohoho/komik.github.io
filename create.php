<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komik</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Tambah Komik</h1>
    </header>
    <main>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required>
            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" required>
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" required>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required>
            <button type="submit" name="submit">Tambah</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            include 'includes/db.php';
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $gambar = $_FILES['gambar']['name'];
            $target = "images/" . basename($gambar);

            $query = "INSERT INTO komik (judul, penulis, penerbit, harga, stok, gambar) VALUES ('$judul', '$penulis', '$penerbit', '$harga', '$stok', '$gambar')";
            mysqli_query($conn, $query);

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
                echo "<p>Komik berhasil ditambahkan!</p>";
            } else {
                echo "<p>Gagal mengupload gambar!</p>";
            }
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Toko Komik Anime</p>
    </footer>
</body>
</html>
