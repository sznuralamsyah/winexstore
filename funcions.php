<?php 
session_start();
//koneksi ke databasae
$connect = mysqli_connect("localhost", "root", "", "winexstore");

function query($query) {
	global $connect;
	$result = mysqli_query($connect, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}

function tambah($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$kategori = htmlspecialchars($data["kategori_id"]);
	$edisi = htmlspecialchars($data["edisi"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$harga = htmlspecialchars($data["harga"]);

//upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

//memasukan data ke tabel pakaian
	// $query = "INSERT INTO pakaian
	// 			values
	// 		('$nama','$kategori','$gambar','$edisi','$deskripsi','$harga')
	// ";
	$query = "INSERT INTO pakaian (nama, kategori_id, gambar, edisi, deskripsi, harga)
          VALUES ('$nama', '$kategori', '$gambar', '$edisi', '$deskripsi', '$harga')";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}	

function upload() {
	$namaFile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];

	//cek apakah ada gambar yang di upload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}
	//cek apakah yang diupload adalah gambar atau bukan
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = (explode('.', $namaFile));
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			</script>";
		return false;
	}

	//lolos pengecekan dan siap upload
	//buat nama file baru dulu
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
	return 'img/' . $namaFileBaru;

}

function hapus($id) {
	global $connect;
	$query ="DELETE FROM pakaian where id = $id";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function ubah($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$kategori = htmlspecialchars($data["kategori_id"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$edisi = htmlspecialchars($data["edisi"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$harga = htmlspecialchars($data["harga"]);

	//cek apakah admin menginput gambar baru
	if ($_FILES["gambar"]["error"] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE pakaian SET
				nama = '$nama',
				kategori_id = '$kategori',
				gambar = '$gambar',
				edisi = '$edisi',
				deskripsi = '$deskripsi',
				harga = '$harga'
				WHERE id = $id

	";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function cari($keyword) {
	// $query = "SELECT pakaian.*, nama.nama FROM pakaian JOIN nama ON nama.id = pakaian.nama_id
	// 		WHERE 
	// 		nama LIKE '%$keyword%' OR 
	// 		kategori LIKE '%$keyword%'
	// 		";
	$query = "SELECT pakaian.*, kategori.kategori 
          FROM pakaian 
          JOIN kategori ON kategori.id = pakaian.kategori_id
          WHERE 
          pakaian.nama LIKE '%$keyword%' OR 
          kategori.kategori LIKE '%$keyword%'
          ";

	return query($query);		

}

function registrasi($data) {
	global $connect;
	$username = strtolower($data["username"]);
	$password = mysqli_real_escape_string($connect, $data["password"]);
	$password2 = mysqli_real_escape_string($connect, $data["password2"]);

	//cek apakah username sudah terdaftar atau belum

	$result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username'");
	
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah terdaftar!');
		</script>";
		return false;
	}

	//cek konfirmasi password
	if ($password != $password2) {
		echo "<script>
				alert ('konfirmasi password salah!');
			</script>";
 		return false;
	} 
	
	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user ke database
	mysqli_query($connect, "INSERT INTO user values('$username', '$password')");

	return mysqli_affected_rows($connect);
}

function tambah_kategori($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$kategori = htmlspecialchars($data["kategori"]);
	// $query = "INSERT INTO kategori
	// 			values
	// 		('$kategori')
	// ";
	$query = "INSERT INTO kategori (kategori) VALUES ('$kategori')";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}	

function ubah_kategori($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$kategori = htmlspecialchars($data["kategori"]);

	$query = "UPDATE kategori SET
				kategori = '$kategori'
				WHERE id = $id ";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function hapus_kategori($id) {
	global $connect;
	$query ="DELETE FROM kategori where id = $id";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}
?>