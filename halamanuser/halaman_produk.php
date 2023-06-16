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
	<link rel="stylesheet" href="halaman_produk.css">
</head>
<body>
	<!-- Navigasi Start -->
	<nav class="navigasi">
		<div class="nav-kiri">
			<img src="../img/alditaher.png">
			<p>MiCAM</p>
		</div>
		<div class="nav-kanan">
			<a href="../index.php">Dashboard</a>
			<a href="halaman_produk.php">Product</a>
			<a href="about.php">About us</a>
		</div>
	</nav>
	<!-- Navigasi End -->
	<!-- Etalase Settings -->
	<div class="container-etalase">
		<div class="menu-etalase">
			<div class="header-etalase">
				<h1>Daftar Produk</h1>
				<div class="find-product">
					<form action="" method="get">
						<input type="text" name="keyword" size="50" autofocus placeholder="cari berdasarkan merek/tipe.." autocomplete="off">
						<button type="submit" name="cari">Cari Produk!</button>
					</form>
				</div>
			</div>
			<div class="allmenu-etalase">
				<div class="list-product">
					<a href="halaman_produk.php">semua produk</a>
					<?php foreach($merek as $mrk) : ?>
					<a href="?merek_id=<?php echo $mrk["id"]; ?>"><?php echo $mrk["merek"]; ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<ul>
		<?php foreach($kamera as $row) : ?>
		<div class="card" style="width: 18rem;">
  			<img style="width: 100px; height: 100px;" src="../<?php echo $row["gambar"]; ?>" alt="gambar kamera" class="class-image-top">
  			<div class="card-body">
    			<h5 class="card-title"><a href="kamera.php?id=<?php echo $row["id"]; ?>"> <?php echo $row["merek"];?> <?php echo $row["tipe"] ?></a></h5>
    			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    			<a href="#" class="btn btn-primary">Go somewhere</a>
  			</div>
		</div>					
		<?php endforeach; ?>
	</ul>
	<a href="linkwa"><h1>beli via whatsapp!</h1></a>
	<footer>
		<p>OUR SOCIAL MEDIA</p>
		<div class="social">
			<div class="instagram">
				<a href="link ig"><img src="../img/instagram.png"></a>
			</div>
			<div class="tiktok">
				<a href="link tiktok"><img src="../img/tik-tok.png"></a>
			</div>
			<div class="youtube">
				<a href="link youtube"><img src="../img/youtube.png"></a>
			</div>
		</div>
	</footer>

</body>
</html>