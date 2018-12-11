<?php
session_start();
require_once('qlib.php');
if(!isset($_SESSION['nama_pengguna'])) {
	header('location:../login.php');
}
$oop = new SmartQuery();
if(isset($_GET['do'])) {
	$kd_slot	= base64_decode($_GET['do']);
	include('../qrlib/qrlib.php');
	QRcode::png($_GET['do'],"../slot_image/".$_GET['do'].".png",'H',10,4);
	echo "<img src='jack.png'/>";
	$_SESSION['kode_slot'] = $kd_slot;
	$tanggal	= date('Y-m-d');
	$d = $oop->__book($con,$kd_slot,$_SESSION['id_pengguna'],$tanggal);
	if($d) {
		header('location:index.php');
		unset($_SESSION['mulai']);
	}
}
elseif (isset($_GET['cf'])) {
	$d = $oop->__expired($con,$_SESSION['id_pengguna']);
	if($d) {
		header('location:logout.php');
		unset($_SESSION['mulai']);
	}
}
else {
	header('location:index.php');
}