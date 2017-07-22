<?php
	require "../../php/connection.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $strQuery = "INSERT INTO kelurahan VALUES(NULL ,'$id', '$nama')";
	$query = mysqli_query($connection, $strQuery);
		
	if(!$query){
        echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menambah Data Kelurahan');</script>";
	}

    echo "<script language=javascript>document.location.href='../kelurahan.php'</script>";
	mysqli_close($connection);
?>