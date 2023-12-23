<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $success_message = "Logout berhasil. Sampai jumpa!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Pancing 2 Bersaudara</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url("mancing.png");
            background-size: cover;
            padding: 20px;
        }

        .container {
            margin-top: 20px;
        }

        .btn-margin {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-3">Daftar Produk</h2>
        <?php
        if (!empty($success_message)) {
            echo "<div class='alert alert-success'>$success_message</div>";
        }
        ?>
        <a type="tambah" class="btn btn-primary btn-margin" href="tambah.php">Tambah Produk</a>
        <a type="logout" class="btn btn-danger btn-margin" href="logout.php">Logout</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');
                $result = $conn->query("SELECT * FROM produk");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_produk'] . "</td>";
                    echo "<td>" . $row['nama_produk'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>
                            <a class='btn btn-warning btn-margin' href='edit.php?id=" . $row['id_produk'] . "'>Edit</a>
                            <a class='btn btn-danger btn-margin' href='hapus.php?id=" . $row['id_produk'] . "'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
