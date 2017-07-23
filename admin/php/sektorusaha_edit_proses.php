<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$nama = $_POST['nama'];
			
	$strQuery = "UPDATE sektor_usaha SET namasektor = '$nama' WHERE id_sektor = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Sektor Usaha');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../sektorusaha.php'</script>";
	mysqli_close($connection);
?>