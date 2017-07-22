<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
			
	$strQuery = "DELETE FROM sektor_usaha WHERE id_sektor = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Sektor Usaha');</script>";
	}
	
	echo "<script language=javascript>document.location.href='../sektorusaha.php'</script>";
	mysqli_close($connection);
?>