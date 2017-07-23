<?php
	require "../../php/connection.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $strQuery = "UPDATE kelurahan SET namakel = '$nama' WHERE idkel = $id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Kelurahan');</script>";
	}

	echo "<script language=javascript>document.location.href='../dashboard.php'</script>";
	mysqli_close($connection);
?>