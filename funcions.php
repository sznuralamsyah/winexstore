<?php 
session_start();
//koneksi ke databasae
$connect = mysqli_connect("localhost", "root", "", "tokoonline");

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
	$merek = htmlspecialchars($data["merek_id"]);
	$tipe = htmlspecialchars($data["tipe"]);
	$gambar = htmlspecialchars($data["gambar"]);
	$kondisi = htmlspecialchars($data["kondisi"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$harga = htmlspecialchars($data["harga"]);

	$query = "INSERT INTO kamera
				values
			('','$merek','$tipe','$gambar','$kondisi','$deskripsi','$harga')
	";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}	

function hapus($id) {
	global $connect;
	$query ="DELETE FROM kamera where id = $id";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function ubah($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$merek = htmlspecialchars($data["merek_id"]);
	$tipe = htmlspecialchars($data["tipe"]);
	$gambar = htmlspecialchars($data["gambar"]);
	$kondisi = htmlspecialchars($data["kondisi"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$harga = htmlspecialchars($data["harga"]);

	$query = "UPDATE kamera SET
				merek_id = '$merek',
				tipe = '$tipe',
				gambar = '$gambar',
				kondisi = '$kondisi',
				deskripsi = '$deskripsi',
				harga = '$harga'
				WHERE id = $id

	";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function cari($keyword) {
	$query = "SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id
			WHERE 
			merek LIKE '%$keyword%' OR 
			tipe LIKE '%$keyword%'
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
	mysqli_query($connect, "INSERT INTO user values('', '$username', '$password')");

	return mysqli_affected_rows($connect);
}

function tambah_kategori($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$merek = htmlspecialchars($data["merek"]);
	$query = "INSERT INTO merek
				values
			('','$merek')
	";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}	

function ubah_kategori($data) {
	global $connect;
		// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$merek = htmlspecialchars($data["merek"]);

	$query = "UPDATE merek SET
				merek = '$merek'
				WHERE id = $id ";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}

function hapus_kategori($id) {
	global $connect;
	$query ="DELETE FROM merek where id = $id";
	mysqli_query($connect, $query);
	return mysqli_affected_rows($connect);
}
?>