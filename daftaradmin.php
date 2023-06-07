<?php
require 'funcions.php';

if (isset($_POST["register"])) {
	
	if (registrasi($_POST) > 0) {
		echo"<script> 
				alert ('user baru berhasil di tambahkan!');
			</script>";
	} else {
		echo mysqli_error($connect);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>daftar admin</title>
</head>
<body>
	<h1>Daftar Akun admin</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username" required autocomplete="off">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password" required autocomplete="off">
			</li>
			<li>
				<label for="password2">Konfirmasi Password : </label>
				<input type="password" name="password2" id="password2" required autocomplete="off">
			</li>
			<li>
				<button type="submit" name="register">Daftar Sekarang!</button>
			</li>
		</ul>

	</form>
	
</body>
</html>