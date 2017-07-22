<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
			
	$strQuery = "UPDATE kecamatan SET namakec = '$nama' WHERE idkec = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Kecamatan');</script>";
	}
	
	echo "<script language=javascript>document.location.href='../kecamatan.php'</script>";
	mysqli_close($connection);
?>