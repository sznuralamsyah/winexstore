<?php

require ('../funcions.php');

//ambil data dari tabel kamera /query data kamera
$pakaian = query("SELECT pakaian.*, kategori.kategori FROM pakaian JOIN kategori ON kategori.id = pakaian.kategori_id");
$kategori = query("SELECT * FROM kategori");
//tombol cari ditekan
if (isset($_GET["cari"])) {
	$pakaian = cari($_GET["keyword"]);
}
if (isset($_GET["kategori_id"])) {
	$pakaian = query("SELECT pakaian.*, kategori.kategori FROM pakaian JOIN kategori ON kategori.id = kategori.kategori_id WHERE kategori.id = $_GET[kategori_id]");
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
			<img src="../img/micam.png">
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
			</div>
			<div class="find-product">
				<form action="" method="get">
					<input type="text" name="keyword" size="50" autofocus placeholder="Cari berdasarkan nama/kategori.." autocomplete="off">
					<button type="submit" name="cari">Cari Produk!</button>
				</form>
			</div>
		</div>
		<div class="list-merek">
			<a href="halaman_produk.php" class="<?= isset($_GET['kategori_id'])?:'active' ?>">semua produk</a>
			<?php foreach($kategori as $ktgr) : ?>
				<a href="?kategori_id=<?php echo $ktgr["id"]; ?>" class="<?= isset($_GET['kategori_id']) && $_GET['kategori_id'] == $ktgr['id']?'active':'' ?>"><?php echo $ktgr["kategori"]; ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="cards">
		<?php foreach($pakaian as $row) : ?>
			<div class="card">
				<img src="../<?php echo $row["gambar"]; ?>" alt="gambar pakaian" class="class-image-top">
				<div class="card-body">
					<h2 class="card-title"><?php echo $row["nama"];?> <?php echo $row["kategori"] ?></h2>
					<ul>
						<li>edisi : <?php echo $row["edisi"]; ?></li>
						<li>harga : Rp.<?php echo $row["harga"]; ?></li>
						<li>deskripsi produk : <br><?php echo nl2br($row["deskripsi"]); ?></li>
					</ul>
				</div>
				<div class="order-icon">
					<a class="card-action" href="whatsapp://send?text=<?= urlencode("Halo saya ingin pesan ".$row['nama'].' '.$row['edisi']) ?>&phone=+6281213566840" target="_blank">
					<div class="pesan">
						<img src="../img/whatsapp.png">
						<p>Pesan Via WhatsApp</p>
					</div>
				</a>
				</div>
				
			</div>
		<?php endforeach; ?>
	</div>
	<footer>
		<p>OUR SOCIAL MEDIA</p>
		<div class="social">
			<div class="instagram">
				<a href="https://instagram.com/micam888.camera?igshid=MzNlNGNkZWQ4Mg=="><img src="../img/instagram.png"></a>
			</div>
			<div class="tiktok">
				<a href="https://www.tiktok.com/@micam888camera?_t=8dGmxLdwReb&_r=1"><img src="../img/tik-tok.png"></a>
			</div>
			<div class="youtube">
				<a href="https://youtube.com/@micamera888"><img src="../img/youtube.png"></a>
			</div>
		</div>
	</footer>

</body>
</html>