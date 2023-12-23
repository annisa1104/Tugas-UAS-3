<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE produk SET nama_produk='$nama_produk', harga=$harga, stok=$stok WHERE id_produk=$id_produk";
    $conn->query($sql);

    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $result = $conn->query("SELECT * FROM produk WHERE id_produk=$id_produk");
    $row = $result->fetch_assoc();
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tambahkan gaya khusus jika diperlukan */
    </style>
</head>

<body>
    <div class="container mt-3">
        <h2>Edit Produk</h2>
        <form method="POST">
            <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" name="nama_produk" value="<?php echo $row['nama_produk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $row['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $row['stok']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
