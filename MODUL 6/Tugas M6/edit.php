<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"UPDATE produk SET

    nama_produk='$nama',
    harga='$harga',
    stok='$stok'

    WHERE id_produk='$id'");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
</head>

<body>

    <h2>Edit Produk</h2>

    <form method="POST">

        <table>
            
            <tr>
                <td>Nama Produk</td>
                <td>
                    <input type="text"
                    name="nama_produk"
                    value="<?php echo $row['nama_produk']; ?>">
                </td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>
                    <input type="number"
                    name="harga"
                    value="<?php echo $row['harga']; ?>">
                </td>
            </tr>

            <tr>
                <td>Stok</td>
                <td>
                    <input type="number"
                    name="stok"
                    value="<?php echo $row['stok']; ?>">
                </td>
            </tr>

            <tr>
                <td>
                <input type="submit"
                name="update"
                value="Update">
                </td>
            </tr>

        </table>

    </form>
    <br>

    <a href="index.php">Kembali</a>

</body>
</html>