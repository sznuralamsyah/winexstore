<?php 
require '../funcions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}
//koneksi ke dbms

$connect = mysqli_connect("localhost", "root", "", "tokoonline");
//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
	if (tambah_kategori($_POST) > 0) {
		echo 
		"<script>
		alert ('kategori berhasil di tambah!');
		</script>";

	} else {
		echo "kategori gagal ditambahkan!";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah kategori Produk</title>
</head>
<body>
	<h1>Tambah kategori Produk</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="merek">kategori : </label>
				<input type="text" name="merek" id="merek">
			</li>
			<li>
				<button type="submit" name="submit">Tambah kategori Produk!</button>
			</li>
			<li>
				<a href="kategori.php">Kembali Ke Daftar kategori</a>
			</li>

		</ul>

	</form>

</body>
</html>