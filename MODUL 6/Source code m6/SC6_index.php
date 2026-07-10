<!DOCTYPE html>
<html>

<head>
    <title>Data Karyawan</title>
</head>

<body>

    <h2>Daftar Karyawan Perusahaan</h2>

    <a href="SC7.1_form_tambah.html">Tambah Karyawan Baru</a>

    <br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php
            include 'SC5_koneksi.php';

            $sql = "SELECT id, nama, jabatan, email FROM karyawan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["jabatan"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><a href='SC7.3_form_edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='SC7.5_hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }

            } else {

                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";

            }

            $conn->close();
            ?>

        </tbody>

    </table>

</body>

</html>