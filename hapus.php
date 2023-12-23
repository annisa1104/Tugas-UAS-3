<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $conn->query("DELETE FROM produk WHERE id_produk=$id_produk");

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
