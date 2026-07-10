<?php

include 'SC5_koneksi.php';

// Mengambil data dari form
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$email = $_POST['email'];

// Query untuk menyisipkan data
$sql = "INSERT INTO karyawan (nama, jabatan, email)
VALUES ('$nama', '$jabatan', '$email')";

if ($conn->query($sql) === TRUE) {

    header("Location: SC6_index.php");
    exit();

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();