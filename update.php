<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Komik</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Update Komik</h1>
    </header>
    <main>
        <?php
        include 'includes/db.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM komik WHERE id=$id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
            <label for="penulis">Penulis:</label>
            <input type="text" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" required>
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
            <button type="submit" name="submit">Update</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $target = "images/" . basename($gambar);
                move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
                $query = "UPDATE komik SET judul='$judul', penulis='$penulis', penerbit='$penerbit', harga='$harga', stok='$stok', gambar='$gambar' WHERE id=$id";
            } else {
                $query = "UPDATE komik SET judul='$judul', penulis='$penulis', penerbit='$penerbit', harga='$harga', stok='$stok' WHERE id=$id";
            }
            mysqli_query($conn, $query);
            header("Location: index.php");
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Toko Komik Anime</p>
    </footer>
</body>
</html>
