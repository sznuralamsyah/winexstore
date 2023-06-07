<?php
require '../funcions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

$id = $_GET["id"];

if (hapus($id) > 0) {
	echo 
		"<script>
		alert ('Data produk berhasil di hapus!');
		document.location.href = 'daftar_produk.php';
		</script>";
} else {
	"<script>
		alert ('Data produk gagal di hapus!');
		document.location.href = 'daftar_produk.php';
		</script>";
}

?>