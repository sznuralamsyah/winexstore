<?php
require ('funcions.php');
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>halaman admin</title>
</head>
<body>
	<h1>halaman admin</h1>
		<p>halo <?php echo $_SESSION["user"]["username"]; ?></p>
		<a href="logout.php">logout!</a>
	<form action="">
		<ul>
			<li><a href="produk/daftar_produk.php">daftar produk</a></li>
			<li><a href="kategori/kategori.php">kategori produk</a></li>
		</ul>
	</form>
</body>
</html>	