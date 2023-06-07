<?php
require 'funcions.php';
session_destroy();
header("Location: login.php");
exit;
?>