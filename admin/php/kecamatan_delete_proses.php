<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
			
	$strQuery = "DELETE FROM kecamatan WHERE idKec = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Kecamatan');</script>";
	}	

	echo "<script language=javascript>document.location.href='../kecamatan.php'</script>";
	mysqli_close($connection);
?>