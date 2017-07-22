<?php
	require "../../php/connection.php";
	$id = $_POST['id'];
    $nama = $_POST['nama'];
    $usaha = $_POST['usaha'];
    $utama = $_POST['utama'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $telepon = $_POST['telepon'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $skala = $_POST['skala'];
    $sektor = $_POST['sektor'];
    $gambar1 = $_POST['gambar1'];
    $gambar2 = $_POST['gambar2'];
    $gambar3 = $_POST['gambar3'];
    $gambar4 = $_POST['gambar4'];
    $gambar5 = $_POST['gambar5'];

	$login_id = $_POST['login_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
			
	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);

	$strQuery = "UPDATE data_usaha du
    INNER JOIN kecamatan k ON du.Kecamatan = k.Idkec
    INNER JOIN kelurahan kel ON du.Kelurahan = kel.idkel
    INNER JOIN skala_usaha sk ON du.Skala_Usaha = sk.id_skala
    INNER JOIN sektor_usaha su ON du.Sektor_Usaha = su.id_Sektor
    SET 
	nama_usaha = '$nama', 
	produk_usaha = '$usaha', 
	produk_utama = '$utama', 
	alamat = '$alamat',  
	k.NamaKec = '$kecamatan',
	kel.Namakel = '$kelurahan', 
	telp = '$telepon', 
	latitude = '$latitude', 
	longitude = '$longitude', 
	sk.namaskala = '$skala', 
	su.namasektor = '$sektor', 
	gambar1 = '$gambar1', 
	gambar2 = '$gambar2', 
	gambar3 = '$gambar3', 
	gambar4 = '$gambar4', 
	gambar5 = '$gambar5'
	WHERE du.id_usaha = $id";
	$query = mysqli_query($connection, $strQuery);
	if($query){
        mysqli_commit($connection);
        echo "<script language=javascript>alert('Data Usaha Berhasil Di Update');</script>";
	}else{
		mysqli_rollback($connection);
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Usaha');</script>";
	}
	
	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../datausaha.php'</script>";
	mysqli_close($connection);
?>