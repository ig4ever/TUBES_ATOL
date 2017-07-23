<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
			
	$strQuery = "DELETE FROM data_usaha WHERE id_usaha = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Usaha');</script>";
	}
	
	echo "<script language=javascript>document.location.href='../dashboard.php'</script>";
	mysqli_close($connection);
?>