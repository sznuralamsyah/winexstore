<?php
require 'funcions.php';

if (isset($_SESSION["login"])) {
	header("Location: halaman_admin.php");
	exit;
}

if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
	//cek username
	if(mysqli_num_rows($result) === 1) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			//set session
			$_SESSION["login"] = true;
			$_SESSION["user"] = $row;
			header("Location: halaman_admin.php");
			exit;
		}
	}	$error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login admin</title>
</head>
<body>
	<h1>Login Admin</h1>
	<?php if (isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username / password salah!</p>
	<?php endif; ?>
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
				<button type="submit" name="login">Login!</button>
			</li>
		</ul>
	</form>
	<!-- <p>Belum punya akun?<a href="registrasi.php">Daftar Sekarang!</a></p> -->

</body>
</html>