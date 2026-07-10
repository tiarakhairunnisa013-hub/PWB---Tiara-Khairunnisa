<?php

include 'SC5_koneksi.php';

// Mengambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$email = $_POST['email'];

// Query untuk memperbarui data
$sql = "UPDATE karyawan
SET nama='$nama', jabatan='$jabatan', email='$email'
WHERE id=$id";

if ($conn->query($sql) === TRUE) {

    header("Location: SC6_index.php");
    exit();

} else {

    echo "Error updating record: " . $conn->error;

}

$conn->close();