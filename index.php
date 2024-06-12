<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Komik Anime</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Toko Komik Anime</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="create.php">Tambah Komik</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Daftar Komik</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'includes/db.php';
                $query = "SELECT * FROM komik";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['judul']}</td>
                            <td>{$row['penulis']}</td>
                            <td>{$row['penerbit']}</td>
                            <td>{$row['harga']}</td>
                            <td>{$row['stok']}</td>
                            <td><img src='images/{$row['gambar']}' alt='{$row['judul']}' width='100'></td>
                            <td>
                                <a href='update.php?id={$row['id']}'>Edit</a> |
                                <a href='delete.php?id={$row['id']}'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Toko Komik Anime</p>
    </footer>
</body>
</html>
