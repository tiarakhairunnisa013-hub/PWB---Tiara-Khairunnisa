<?php
include "koneksi.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"INSERT INTO produk
    (nama_produk,harga,stok)
    VALUES
    ('$nama','$harga','$stok')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Produk</title>
</head>

<body>

    <h2>Tambah Produk</h2>

    <form method="POST">
        <table>
            <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" required></td>
            </tr>

            <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" required></td>
            </tr>

            <tr>
            <td>Stok</td>
            <td><input type="number" name="stok" required></td>
            </tr>

            <tr>
            <td></td>
            <td>
            <input type="submit" name="simpan" value="Simpan">
            </td>
            </tr>
        </table>
    </form>
    <br>
    
    <a href="index.php">Kembali</a>

</body>
</html>