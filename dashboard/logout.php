<?php
session_start();
if(!isset($_SESSION['nama_pengguna'])) {
	header('location:../login.php');
}
$do = session_destroy();
if($do) {
	header('location:../login.php');
}