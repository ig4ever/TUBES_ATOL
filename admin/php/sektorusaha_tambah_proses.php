<?php
	require "../../php/connection.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
			
	$strQuery = "INSERT INTO sektor_usaha VALUES(null,'$nama')";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menambah Data Sektor Usaha');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../sektorusaha.php'</script>";
	mysqli_close($connection);
?>