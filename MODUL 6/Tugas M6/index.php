<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <style>
        body{
            font-family: Arial;
            margin:40px;
        }

        table{
            border-collapse:collapse;
            width:80%;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:10px;
            text-align:center;
        }

        a{
            text-decoration:none;
        }

        .btn{
            padding:8px 12px;
            background:blue;
            color:white;
        }
    </style>
</head>

<body>

    <h2>Data Produk</h2>

    <a href="tambah.php" class="btn">Tambah Produk Baru</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($data)){ ?>

        <tr>
            <td><?php echo $row['id_produk']; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td>Rp <?php echo number_format($row['harga']); ?></td>
            <td><?php echo $row['stok']; ?></td>
            
            <td>
                <a href="edit.php?id=<?php echo $row['id_produk']; ?>">Edit</a> |

                <a href="hapus.php?id=<?php echo $row['id_produk']; ?>"
                onclick="return confirm('Yakin ingin menghapus?')">
                Hapus
                </a>
            </td>
        </tr>

        <?php } ?>
    </table>

</body>
</html>