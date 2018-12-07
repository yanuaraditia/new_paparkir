<?php
session_start();
$do = session_destroy();
if($do) {
	header('location:login.php');
}