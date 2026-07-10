<!DOCTYPE html>
<html>
<body>

<form method="get" action="l14_superglobals.php">
Nama :
<input type="text" name="nama">
<input type="submit">
</form>

<?php
if (isset($_GET['nama'])) {
$nama = htmlspecialchars($_GET['nama']);
echo "<br>Halo, " . $nama . "!";
}
?>

</body>
</html>