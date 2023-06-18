<?php
require ('../funcions.php');
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}
//ambil data dari tabel merek
$merek = query("SELECT * FROM merek");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>kategori produk</title>
</head>
<body>
	<h1>kategori produk</h1>

	<a href="tambah_kategori.php">Tambah kategori Produk</a> 
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>no</th>
				<th>aksi</th>
				<th>merek</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($merek as $row) : ?>
			<tr>
				<td><?php echo $i; ?></td>				
				<td><a href="ubah_kategori.php?id=<?php echo $row["id"]; ?>">ubah</a> |
				<a href="hapus_kategori.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus kategori produk?')">hapus</a>
				</td>
				<td><?php echo $row["merek"]; ?> </td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</table>
		<a href="../halaman_admin.php">kembali ke halaman admin!</a>
</body>
</html>	