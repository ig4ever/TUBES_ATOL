<?php
	require "../../php/connection.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $status = $_POST['aktifasi'];
    $telepon = $_POST['telepon'];
    $keterangan = $_POST['keterangan'];

	$login_id = $_POST['login_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
			
	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);
	if($_FILES['photo_ktp']['size'] == 0) {
		$strQuery = "UPDATE pemilik_usaha SET 
		nama = '$nama', 
		alamat = '$alamat',  
		email = '$email', 
		tempat_lahir = '$tempat_lahir', 
		tanggal_lahir = '$tanggal_lahir', 
		aktifasi = '$status',
		no_telp = '$telepon',  
		keterangan = '$keterangan'
		WHERE pemilik_usaha_id = $id";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			if(!empty($password)){
				$encPassword = md5($password);
				$strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
			}else {
				$strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
			}	
			
			$query = mysqli_query($connection, $strQuery);
			if($query){
				mysqli_commit($connection);
                echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha');</script>";
			}else {
				mysqli_rollback($connection);
				echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
			}
		}else{
			mysqli_rollback($connection);
			echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
		}
	}else {
		$target_dir = "../../upload/cv/";
		$photoKtp = str_replace(" ","", $nama);
		$temp = explode(".", $_FILES["photo_ktp"]["name"]);
		$photoKtp = strtolower($photoKtp . date('YmdHis') . "." . end($temp));
		$target_file = $target_dir . basename($photoKtp);
		if (move_uploaded_file($_FILES['photo_ktp']['tmp_name'], $target_file)) {
			$strQuery = "UPDATE pemilik_usaha SET 
		nama = '$nama', 
		alamat = '$alamat',  
		email = '$email', 
		tempat_lahir = '$tempat_lahir', 
		tanggal_lahir = '$tanggal_lahir', 
		aktifasi = '$status',
		no_telp = '$telepon',  
		keterangan = '$keterangan',  
		photo_ktp = '$photoKtp' 
		WHERE pemilik_usaha_id = $id";
			$query = mysqli_query($connection, $strQuery);
			if($query){				
				if(!empty($password)){
					$encPassword = md5($password);
					$strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
				}else {
					$strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
				}	
				
				$query = mysqli_query($connection, $strQuery);
				if($query){
					mysqli_commit($connection);
                    echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha');</script>";
				}else {
					mysqli_rollback($connection);
					echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
				}
			}else{
				mysqli_rollback($connection);
				echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
			}
		}else{
			mysqli_rollback($connection);
			echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupload Foto KTP');</script>";
		}
	}

	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../pemilikusaha_edit.php?id=$id' </script>";
	mysqli_close($connection);
?>