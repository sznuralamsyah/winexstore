<?php 
require '../funcions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}
//koneksi ke dbms

$connect = mysqli_connect("localhost", "root", "", "winexstore");
//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		echo 
		"<script>
		alert ('data produk berhasil di tambah!');
		document.location.href = '../halaman_admin.php';
		</script>"
		;

	} else {
		echo "data produk gagal ditambahkan!";
	}
}
$pakaian = query("SELECT * FROM pakaian");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Produk</title>
	<link rel="stylesheet" type="text/css" href="../addchange_items.css">
	<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
		<div class="head">
			<header>
				<div class="left-session">
					<h1>Halaman Admin</h1>
				</div>
				<div class="right-session">
					<div class="sapa">
						<p>Halo <?php echo $_SESSION["user"]["username"]; ?></p>
					</div>
					<div class="exit">
						<a href="../logout.php"><img src="../img/logout.png"></a>
					</div>
				</div>
			</header>
			<div class="form">
				<form action="">
					<a href="../halaman_admin.php" class="daf">daftar produk</a>
					<a href="../kategori/kategori.php" class="cat">kategori produk</a>
				</form>
			</div>
		</div>
		<header>
			<h1>Tambah Data Produk</h1>
		</header>
		<div class="back">
			<a href="../halaman_admin.php">Kembali Ke Daftar Produk</a>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
				<div class="image-preview">
					<label for="gambar">
						<img src="" id="image-preview" alt="">
						<div>Pilih atau drop gambar</div>
						<input type="file" name="gambar" id="gambar" accept="image/*">
					</label>
				</div>
				<div class="row">
					<div class="input-group">
					<label for="nama">nama</label>
					<input class="input" type="text" name="nama" id="nama" placeholder="masukkan nama produk" required autocomplete="off">
					</div>
					<div class="input-group">
						<label for="kategori">kategori</label>
						<select class="input" name="kaetgori_id" id="kategori">
							<?php foreach($kategori as $ktgr) : ?>
							<option value="<?php echo $ktgr['id'] ?>"><?php echo $ktgr["kategori"] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-group">
						<label for="edisi">edisi</label>
						<input class="input" type="text" name="edisi" id="edisi" placeholder="masukkan edisi produk" required autocomplete="off">
					</div>
					<div class="input-group">
						<label for="harga">harga</label>
						<input class="input" type="text" name="harga" id="harga" placeholder="masukkan harga produk" required autocomplete="off">
					</div>
				</div>
				<div class="input-group">
					<label for="deskripsi">deskripsi</label>
					<textarea class="input" rows="4" type="text" name="deskripsi" id="deskripsi" placeholder="masukkan deskripsi produk" required autocomplete="off"></textarea>
				</div>
				<button type="submit" name="submit">Tambah Data</button>
		</form>
	</div>
	<script>
		const fileInput = document.querySelector('#gambar');
		const dropzone = document.querySelector('.image-preview div')
		fileInput.addEventListener('change', function(e){
			const {files} = e.target;
			const url = URL.createObjectURL(files[0])
			const img = document.querySelector('#image-preview');
			img.src = url;
		})
		fileInput.addEventListener('dragenter', function() {
			dropzone.classList.add('dragover');
		});

		fileInput.addEventListener('dragleave', function() {
			dropzone.classList.remove('dragover');
		});
	</script>
</body>
</html>