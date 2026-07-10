<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_perusahaan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "<h2> Berhasil terhubung ke database <b>db_perusahaan</b>.</h2>";
}