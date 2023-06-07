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
	if (tambah($_POST) > 0) {
		echo 
		"<script>
		alert ('data produk berhasil di tambah!');
		</script>";

	} else {
		echo "data produk gagal ditambahkan!";
	}
}
$merek = query("SELECT * FROM merek");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Produk</title>
</head>
<body>
	<h1>Tambah Data Produk</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="merek">merek : </label>
				<select name="merek_id" id="merek">
					<?php foreach($merek as $mrk) : ?>
					<option value="<?php echo $mrk['id'] ?>"><?php echo $mrk["merek"] ?></option>
					<?php endforeach; ?>
					
				</select>
			</li>
			<li>
				<label for="tipe">tipe : </label>
				<input type="text" name="tipe" id="tipe" required autocomplete="off">
			</li>
			<li>
				<label for="gambar">gambar : </label>
				<input type="text" name="gambar" id="gambar" required autocomplete="off">
			</li>
			<li>
				<label for="kondisi">kondisi : </label>
				<input type="text" name="kondisi" id="kondisi" required autocomplete="off">
			</li>
			<li>
				<label for="deskripsi">deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required autocomplete="off">
			</li>
			<li>
				<label for="harga">harga : </label>
				<input type="text" name="harga" id="harga" required autocomplete="off">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data Produk!</button>
			</li>
			<li>
				<a href="daftar_produk.php">Kembali Ke Daftar Produk</a>
			</li>

		</ul>

	</form>

</body>
</html>