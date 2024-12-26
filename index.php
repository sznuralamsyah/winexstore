<?php 

require ('funcions.php');
$pakaian = query("SELECT pakaian.*, kategori.kategori FROM pakaian JOIN kategori ON kategori.id = pakaian.kategori_id ORDER BY id");
$new_product = $pakaian[count($pakaian)-1];
$top_seller = query("SELECT pakaian.*, kategori.kategori FROM pakaian JOIN kategori ON kategori.id = pakaian.kategori_id WHERE top_seller = 1")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#ffffff">
	<title>Dashboard</title>
	<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<!-- icons -->
		<script src="https://unpkg.com/feather-icons"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- css -->
		<link rel="stylesheet" type="text/css" href="index.css">
	<!-- manifest -->
	 	<link rel="manifest" href="manifest.json">
</head>
<body>
	<!-- Navigasi Start -->
	<nav class="navigasi">
		<div class="nav-kiri">
			<img src="icons/icon-192.jpeg">
			<p>WINEXSTORE</p>
		</div>
		<div class="nav-kanan">
			<a href="">Dashboard</a>
			<a href="halamanuser/halaman_produk.php">Product</a>
			<a href="halamanuser/about.php">About us</a>
		</div>
	</nav>
	<!-- Navigasi End -->
	<!-- <section class="landing-image">
		<p>SELAMAT DATANG DI <span>MiCAM</span></p>
	</section> -->
	<!-- carousel start -->
	<div class="carousel-container">
    <div class="carousel">
        <img src="img/csl-image1.jpeg" alt="Gambar 1" class="carousel-item active">
        <img src="img/csl-image2.jpeg" alt="Gambar 2" class="carousel-item">
        <img src="img/csl-image3.jpeg" alt="Gambar 3" class="carousel-item">
    </div>
    <button class="prev">❮</button>
    <button class="next">❯</button>
	</div>
	<!-- carousel end -->

	<section class="promo">
		<div class="new-promo">
			<p class="line">NEW PRODUCT</p>
			<div class="items-np">
				<div class="left-np">
					<img style="width: 300px; height: 300px;" src="<?php echo $new_product['gambar']; ?>" alt="gambar pakaian">
					<p>
						<?php echo $new_product["nama"];?> <?php echo $new_product["edisi"] ?>
					</p>
				</div>
				<div class="right-np">
					<ul>
						<li>Kategori : <?php echo $new_product["kategori"]; ?></li>
						<li>Harga : Rp.<?php echo $new_product["harga"]; ?></li>
						<li>Deskripsi Produk : <br><?php echo nl2br($new_product["deskripsi"]); ?></li>
					</ul>
					<div class="order-icon">
						<a href="whatsapp://send?text=<?= urlencode("Halo saya ingin pesan ".$new_product['nama'].' '.$new_product['edisi']) ?>&phone=+6281213566840">
							<div class="pesan">
								<!-- <img src="img/whatsapp.png"> -->
								<p>Pesan Via WhatsApp</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="promo">
		<div class="new-promo">
			<p class="line">TOP SELLER</p>
			<div class="items-np">
				<div class="left-np">
					<img style="width: 300px; height: 300px;" src="<?php echo $top_seller['gambar']; ?>" alt="gambar pakaian">
					<p>
						<?php echo $top_seller["nama"];?> <?php echo $top_seller["edisi"] ?>
					</p>
				</div>
				<div class="right-np">
					<ul>
						<li>Kategori : <?php echo $top_seller["kategori"]; ?></li>
						<li>Harga : Rp.<?php echo $top_seller["harga"]; ?></li>
						<li>Deskripsi Produk : <br><?php echo nl2br($top_seller["deskripsi"]); ?></li>
					</ul>
					<div class="order-icon">
						<a href="whatsapp://send?text=<?= urlencode("Halo saya ingin pesan ".$top_seller['nama'].' '.$top_seller['edisi']) ?>&phone=+6281213566840">
						<div class="pesan">
							<!-- <img src="img/whatsapp.png"> -->
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
				<a href="https://www.instagram.com/winex.store"><img src="img/instagram.png"></a>
			</div>
			<div class="tiktok">
				<a href="/"><img src="img/tik-tok.png"></a>
			</div>
			<div class="youtube">
				<a href="/"><img src="img/youtube.png"></a>
			</div>
		</div>
	</footer>

	<!-- icons -->
	<script>
      feather.replace()
    </script>

	<script>
		window.addEventListener("load",()=>{
			if("serviceWorker" in navigator){
				navigator.serviceWorker.register("service-worker.js")
				.then(registration => {
           			 console.log('Service Worker registered:', registration);
        		})
        		.catch(error => {
            		 console.error('Service Worker registration failed:', error);
        		});
			}
		})
	</script>

	<!-- carousel -->
	<script>
		const carousel = document.querySelector('.carousel');
		const items = document.querySelectorAll('.carousel-item');
		const prev = document.querySelector('.prev');
		const next = document.querySelector('.next');

		let currentIndex = 0;

		function updateCarousel() {
    		carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
		}

		prev.addEventListener('click', () => {
    		currentIndex = (currentIndex > 0) ? currentIndex - 1 : items.length - 1;
    		updateCarousel();
		});

		next.addEventListener('click', () => {
    		currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
    		updateCarousel();
		});
	</script>

</body>
</html>