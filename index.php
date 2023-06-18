<?php 

require ('funcions.php');
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id ORDER BY id");
$new_product = $kamera[count($kamera)-1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
	<!-- icons -->
		<script src="https://unpkg.com/feather-icons"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- css -->
		<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<!-- Navigasi Start -->
	<nav class="navigasi">
		<div class="nav-kiri">
			<img src="img/micam.png">
			<p>MiCAM</p>
		</div>
		<div class="nav-kanan">
			<a href="">Dashboard</a>
			<a href="halamanuser/halaman_produk.php">Product</a>
			<a href="halamanuser/about.php">About us</a>
		</div>
	</nav>
	<!-- Navigasi End -->
	<section class="landing-image">
		<p>SELAMAT BERGABUNG DENGAN KAMI DI <span>MiCAM</span></p>
	</section>
	<section class="promo">
		<div class="new-promo">
			<p>NEW PRODUCT</p>
			<div class="items-np">
				<div class="left-np">
					<img style="width: 300px; height: 300px;" src="<?php echo $new_product['gambar']; ?>" alt="gambar kamera">
					<p>
						<?php echo $new_product["merek"];?> <?php echo $new_product["tipe"] ?>
					</p>
				</div>
				<div class="right-np">
					<ul>
						<li>harga : Rp.<?php echo $new_product["harga"]; ?></li>
						<li>kondisi : <?php echo $new_product["kondisi"]; ?></li>
						<li>deskripsi produk : <br><?php echo nl2br($new_product["deskripsi"]); ?></li>
					</ul>
					<div class="order-icon">
						<a href="whatsapp://send?text=Hello&phone=+6289694018787">
							<div class="pesan">
								<img src="img/whatsapp.png">
								<p>Pesan Via WhatsApp</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<p>OUR SOCIAL MEDIA</p>
		<div class="social">
			<div class="instagram">
				<a href="https://instagram.com/micam888.camera?igshid=MzNlNGNkZWQ4Mg=="><img src="img/instagram.png"></a>
			</div>
			<div class="tiktok">
				<a href="https://www.tiktok.com/@micam888camera?_t=8dGmxLdwReb&_r=1"><img src="img/tik-tok.png"></a>
			</div>
			<div class="youtube">
				<a href="https://youtube.com/@micamera888"><img src="img/youtube.png"></a>
			</div>
		</div>
	</footer>

	<!-- icons -->
	<script>
      feather.replace()
    </script>

</body>
</html>