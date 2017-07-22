<?php
	require "../../php/connection.php";
	$nama = $_POST['nama'];

	$strQuery = "INSERT INTO kecamatan VALUES(NULL ,'$nama')";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menambah Data Kecamatan');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../kecamatan.php'</script>";
	mysqli_close($connection);
?>