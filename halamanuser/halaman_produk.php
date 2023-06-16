<?php

require ('../funcions.php');

//ambil data dari tabel kamera /query data kamera
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id");
$merek = query("SELECT * FROM merek");
//tombol cari ditekan
if (isset($_GET["cari"])) {
	$kamera = cari($_GET["keyword"]);
}
if (isset($_GET["merek_id"])) {
	$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id WHERE merek.id = $_GET[merek_id]");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman produk</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		<h1>Daftar Produk</h1>

		<a href="halaman_produk.php">semua produk</a> |

		<?php foreach($merek as $mrk) : ?>
			<a href="?merek_id=<?php echo $mrk["id"]; ?>"><?php echo $mrk["merek"]; ?></a> |
		<?php endforeach; ?>
		
	<form action="" method="get">
		<input type="text" name="keyword" size="50" autofocus placeholder="cari berdasarkan merek/tipe.." autocomplete="off">
		<button type="submit" name="cari">Cari Produk!</button>
	</form>
	<br>
	<ul>
		<?php foreach($kamera as $row) : ?>
					
			<img style="width: 100px; height: 100px;" src="../<?php echo $row["gambar"]; ?>" alt="gambar kamera">

			<!-- <a href="kamera.php?id=<?php echo $row["id"]; ?>"> <?php echo $row["merek"];?> <?php echo $row["tipe"] ?></a> -->

			<ul>
				<li>merek : <?php echo $row["merek"]; ?></li>
				<li>tipe : <?php echo $row["tipe"]; ?></li>
				<li>harga : Rp.<?php echo $row["harga"]; ?></li>
				<li>kondisi : <?php echo $row["kondisi"]; ?></li>
				<li>deskripsi produk : <br><?php echo nl2br($row["deskripsi"]); ?></li>
				<a href="linkwa"><h3>pesan sekarang</h3></a>
			</ul>
		
		<?php endforeach; ?>
	</ul>
	
	<!-- <a href="linkwa"><h1>beli via whatsapp!</h1></a> -->

</body>
</html>