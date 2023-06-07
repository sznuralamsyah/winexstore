<?php 
require ('funcions.php');
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id");
$new_product = $kamera[count($kamera)-1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<body>
	<p>nama toko</p>
	<a href="">dashboard</a>
	<a href="halamanuser/halaman_produk.php">produk</a>
	<a href="halamanuser/about.php">about us</a>
	<br>
	<br>
	<p>new product</p>
	<ul>
	

			<img style="width: 100px; height: 100px;" src="<?php echo $new_product['gambar']; ?>" alt="gambar kamera">

			<a href="halamanuser/kamera.php?id=<?php echo $new_product["id"]; ?>"> <?php echo $new_product["merek"];?> <?php echo $new_product["tipe"] ?></a>

		
		
	</ul>
	<br>
	<p>our social media</p>
	<a href="link ig">instagram</a>
	<a href="link tiktok">tiktok</a>
	<a href="link yt">youtube</a>
</body>
</html>