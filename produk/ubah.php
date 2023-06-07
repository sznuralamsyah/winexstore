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
	if (ubah($_POST) > 0) {
		echo 
		"<script>
		alert ('data produk berhasil di ubah!');
		</script>";

	} else {
		echo "data produk gagal diubah!";
		echo "<br>";
		echo mysqli_error($connect);

	}
}
$id = $_GET['id'];

$kmr = query("SELECT * FROM kamera WHERE id = $id")[0];
$merek= query("SELECT * FROM merek");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Data Produk</title>
</head>
<body>
	<h1>Ubah Data Produk</h1>

	<form action="" method="post">
		<ul> <input type="hidden" name="id" value="<?php echo $kmr["id"] ?>">
			<li>
				<label for="merek">merek : </label>
				<select name="merek_id" id="merek">
					<?php foreach($merek as $mrk) : ?>
					<option <?php echo $kmr['merek_id'] == $mrk['id'] ? 'selected' : '' ?> value="<?php echo $mrk['id'] ?>"><?php echo $mrk["merek"] ?></option>
					<?php endforeach; ?>
				</select>
			</li>
			<li>
				<label for="tipe">tipe : </label>
				<input type="text" name="tipe" id="tipe" required autocomplete="off" value="<?php echo $kmr["tipe"] ?>">
			</li>
			<li>
				<label for="gambar">gambar : </label>
				<input type="text" name="gambar" id="gambar" required autocomplete="off" value="<?php echo $kmr["gambar"] ?>">
			</li>
			<li>
				<label for="kondisi">kondisi : </label>
				<input type="text" name="kondisi" id="kondisi" required autocomplete="off" value="<?php echo $kmr["kondisi"] ?>">
			</li>
			<li>
				<label for="deskripsi">deskripsi : </label>
				<textarea rows="6" cols="30" name="deskripsi" id="deskripsi" required><?php echo $kmr["deskripsi"] ?></textarea>
			</li>
			<li>
				<label for="harga">harga : </label>
				<input type="text" name="harga" id="harga" required autocomplete="off" value="<?php echo $kmr["harga"] ?>">
			</li>
			<li>
				<button type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin mengubah data produk?')">Ubah Data Prduk</button>
			</li>
			<li>
				<a href="daftar_produk.php">Kembali Ke Daftar Produk</a>
			</li>

		</ul>

	</form>

</body>
</html>