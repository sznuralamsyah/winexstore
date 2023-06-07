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
	if (ubah_kategori($_POST) > 0) {
		echo 
		"<script>
		alert ('kategori berhasil di ubah!');
		</script>";

	} else {
		echo "kategori gagal diubah!";
		echo "<br>";
		echo mysqli_error($connect);

	}
}
$id = $_GET['id'];
$mrk = query("SELECT * FROM merek WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah kategori Produk</title>
</head>
<body>
	<h1>Ubah kategori Produk</h1>

	<form action="" method="post">
		<ul> <input type="hidden" name="id" value="<?php echo $mrk["id"] ?>">
			<li>
				<label for="merek">merek : </label>
				<input type="text" name="merek" id="merek" value="<?php echo $mrk["merek"]?>">
			</li>
			<li>
				<button type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin mengubah kategori produk?')">Ubah kategori Prduk</button>
			</li>
			<li>
				<a href="kategori.php">Kembali Ke kategori Produk</a>
			</li>

		</ul>

	</form>

</body>
</html>