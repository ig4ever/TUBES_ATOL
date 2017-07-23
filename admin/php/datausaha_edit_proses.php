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

	$login_id = $_POST['login_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
			
	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);

    if ($_FILES['img']['size'] != 0) {
        $target_dir = "../../upload/cv/";
        $cv = str_replace(" ", "", $nama);
        $temp = explode(".", $_FILES["img"]["name"]);
        $cv = strtolower($cv . date('YmdHis') . "." . end($temp));
        $target_file = $target_dir . basename($cv);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
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
            kecamatan = '$kecamatan',
            kelurahan = '$kelurahan', 
            telp = '$telepon', 
            latitude = '$latitude', 
            longitude = '$longitude', 
            skala_usaha = '$skala', 
            sektor_usaha = '$sektor', 
            gambar1 = '$cv', 
            gambar2 = '$cv', 
            gambar3 = '$cv', 
            gambar4 = '$cv', 
            gambar5 = '$cv'
            WHERE du.id_usaha = $id";
            $query = mysqli_query($connection, $strQuery);
            if ($query) {
                mysqli_commit($connection);
                echo "<script language=javascript>alert('Data Usaha Berhasil Di Update');</script>";
            } else {
                mysqli_rollback($connection);
                echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Usaha');</script>";
            }
        }
    } else {
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
            kecamatan = '$kecamatan',
            kelurahan = '$kelurahan', 
            telp = '$telepon', 
            latitude = '$latitude', 
            longitude = '$longitude', 
            skala_usaha = '$skala', 
            sektor_usaha = '$sektor', 
            gambar1 = '', 
            gambar2 = '', 
            gambar3 = '', 
            gambar4 = '', 
            gambar5 = ''
            WHERE du.id_usaha = $id";
        $query = mysqli_query($connection, $strQuery);
        if ($query) {
            mysqli_commit($connection);
            echo "<script language=javascript>alert('Data Usaha Berhasil Di Update');</script>";
        } else {
            mysqli_rollback($connection);
            echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Usaha');</script>";
        }
    }
	
	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../datausaha.php'</script>";
	mysqli_close($connection);
?>