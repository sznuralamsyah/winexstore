<?php 

require ('../funcions.php');

if (!isset($_GET["id"]) ) {
	header("Location: halaman_produk.php");
	exit;
}
$id = $_GET["id"];
$pakaian = query("SELECT pakaian.*, kategori.kategori FROM pakaian JOIN kategori ON kategori.id = pakaian.kategori_id WHERE pakaian.id = $id")[0];




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Pakaian</title>
</head>
<body>
		<img src="../<?php echo $pakaian["gambar"]; ?>" alt="gambar pakaian">
	<ul>
		<li>nama : <?php echo $pakaian["nama"]; ?></li>
		<li>kategori : <?php echo $pakaian["kategori"]; ?></li>
		<li>edisi : <?php echo $pakaian["edisi"]; ?></li>
		<li>harga : Rp.<?php echo $pakaian["harga"]; ?></li>
		<li>deskripsi produk : <br><?php echo nl2br($pakaian["deskripsi"]); ?></li>
	</ul>
	<a href="link wa">beli via whatsapp!</a>
</body>
</html>
