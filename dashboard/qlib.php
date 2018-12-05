<?php
$con = mysqli_connect("localhost","root","","paparkir");
class SmartQuery
{
	function __vehicle_list($con)
	{
		$q = "SELECT * FROM jenis_kendaraan";
		$q = mysqli_query($con,$q);
		return $q;
	}
}

class BodyContent
{
	
	function __head_top($active)
	{
		echo "<a class=\"mdl-navigation__link\" href=\"index.php\">Beranda</a>";
		echo "<a class=\"mdl-navigation__link\" href=\"#\">Beranda</a>";
	}
	function __head_nav()
	{
		# code...
	}
}