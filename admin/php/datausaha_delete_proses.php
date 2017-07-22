<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
	$login_id = $_POST['login_id'];
		
	$strQuery = "DELETE FROM data_usaha WHERE id_usaha = $login_id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		mysqli_commit($connection);
	}else {
		mysqli_rollback($connection);
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Usaha');</script>";
	}

	echo "<script language=javascript>document.location.href='../datausaha.php'</script>";
	mysqli_close($connection);
?>