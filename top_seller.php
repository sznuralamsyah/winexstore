<?php

require 'funcions.php';

if(isset($_POST['id'])){
	mysqli_query($connect, "UPDATE pakaian SET top_seller=0");
	mysqli_query($connect, "UPDATE pakaian SET top_seller=1 WHERE id=$_POST[id]");
	echo 'top seller berhasil diganti';
}