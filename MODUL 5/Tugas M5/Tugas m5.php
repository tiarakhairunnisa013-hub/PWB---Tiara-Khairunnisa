<?php
// Inisialisasi variabel untuk menampung data dan pesan error
$nama = $email = $pesan = "";
$error = "";
$sukses = false;

// Memproses data hanya jika form dikirimkan (Metode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validasi sederhana di sisi server: Pastikan tidak ada kolom yang kosong
    if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
        $error = "Semua kolom input wajib diisi! Jangan ada yang kosong.";
    } else {
        // Jika semua data terisi, bersihkan input menggunakan htmlspecialchars() untuk mencegah XSS
        $nama = htmlspecialchars($_POST["nama"]);
        $email = htmlspecialchars($_POST["email"]);
        $pesan = htmlspecialchars($_POST["pesan"]);
        $sukses = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        /* Desain dan Styling dengan Tema Hijau Sage */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f3f6f3; /* Latar belakang abu-abu dengan sentuhan sage tipis */
            color: #3e4a3e;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(135, 169, 135, 0.15);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #e8eee8;
            padding-bottom: 15px;
        }

        header h1 {
            color: #4a5e4a; /* Hijau sage tua */
            font-size: 24px;
        }

        header p {
            color: #7a8a7a;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Styling Form */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5e4a;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #c2d1c2;
            border-radius: 6px;
            font-size: 15px;
            background-color: #fafdfa;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #87a987; /* Fokus warna hijau sage */
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(135, 169, 135, 0.2);
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        button {
            background-color: #87a987; /* Tombol Hijau Sage Utama */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #709270; /* Hijau sage sedikit lebih gelap saat di-hover */
        }

        /* Notifikasi dan Tampilan Data */
        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #fbebeb;
            color: #a94442;
            border: 1px solid #f2dede;
        }

        .alert-success {
            background-color: #eef3ee;
            color: #4a5e4a;
            border: 1px solid #d8e4d8;
            text-align: center;
            font-weight: 600;
        }

        .result-box {
            background-color: #fafdfa;
            border: 1px solid #d8e4d8;
            border-left: 5px solid #87a987; /* Garis aksen sage */
            padding: 20px;
            border-radius: 0 6px 6px 0;
            margin-top: 25px;
        }

        .result-box h3 {
            color: #5c755c;
            margin-bottom: 15px;
            font-size: 18px;
            border-bottom: 1px dashed #d8e4d8;
            padding-bottom: 5px;
        }

        .result-item {
            margin-bottom: 10px;
            color: #4a5e4a;
        }

        .result-item span {
            font-weight: bold;
            color: #3e4a3e;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- 1. Header -->
    <header>
        <h1>Buku Tamu Digital STITEK Bontang</h1>
        <p>Silakan tinggalkan pesan atau komentar Anda di bawah ini</p>
    </header>

    <!-- Pesan Error jika Validasi Gagal -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <!-- 2. Form Input -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) && !$sukses ? htmlspecialchars($_POST['nama']) : ''; ?>" placeholder="Masukkan nama lengkap Anda">
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) && !$sukses ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="nama@example.com">
        </div>

        <div class="form-group">
            <label for="pesan">Pesan / Komentar</label>
            <textarea id="pesan" name="pesan" placeholder="Tuliskan pesan atau komentar Anda di sini..."><?php echo isset($_POST['pesan']) && !$sukses ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>
        </div>

        <button type="submit" name="submit">Kirim Pesan</button>
    </form>

    <!-- 3. Area Tampilan Data -->
    <?php if ($sukses): ?>
        <div class="alert alert-success">
            Terima kasih! Pesan Anda berhasil dikirim.
        </div>

        <div class="result-box">
            <h3>Data yang Baru Saja Dikirim:</h3>
            <div class="result-item">
                <span>Nama Lengkap:</span> <?php echo $nama; ?>
            </div>
            <div class="result-item">
                <span>Alamat Email:</span> <?php echo $email; ?>
            </div>
            <div class="result-item">
                <span>Pesan/Komentar:</span><br>
                <?php echo nl2br($pesan); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>