<?php
    require "../../php/connection.php";

    //$img = $_FILES['img'];
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

	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);


    function reArrayFiles(&$file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    if ($_FILES['img']) {
        $file_ary = reArrayFiles($_FILES['img']);

        foreach ($file_ary as $file) {
            print 'File Name: ' . $file['name'];
            print 'File Type: ' . $file['type'];
            print 'File Size: ' . $file['size'];
//            $arrayTemp = $file['name'];
        }
    }

        if ($_FILES['img']['size'] != 0) {
            $target_dir = "../../upload/cv/";
            $cv = str_replace(" ", "", $nama);
            $temp = explode(".", $_FILES["img"]["name"]);
            $cv = strtolower($cv . date('YmdHis') . "." . end($temp));
            $target_file = $target_dir . basename($cv);
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                $strQuery = "INSERT INTO data_usaha VALUES(
                            null,
                            '$id', 
                            '$nama', 
                            '$usaha', 
                            '$utama',  
                            '$alamat',
                            '$kecamatan',
                            '$kelurahan', 
                            '$telepon', 
                            '$latitude', 
                            '$longitude',  
                            '$skala',
                            '$sektor',
                            '$cv',
                            '$cv', 
                            '$cv', 
                            '$cv',  
                            '$cv'
                        )";
                $query = mysqli_query($connection, $strQuery);
                if ($query) {
                    mysqli_commit($connection);
                    echo "<script language=javascript>alert('Berhasil Menambah Data Usaha');</script>";
                } else {
                    mysqli_rollback($connection);
                    echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menambah Data Usaha');</script>";
                }
            }
        }else{
            $strQuery = "INSERT INTO data_usaha VALUES(
                            null,
                            '$id', 
                            '$nama', 
                            '$usaha', 
                            '$utama',  
                            '$alamat',
                            '$kecamatan',
                            '$kelurahan', 
                            '$telepon', 
                            '$latitude', 
                            '$longitude',  
                            '$skala',
                            '$sektor',
                            '',
                            '', 
                            '', 
                            '',  
                            ''
                        )";
            $query = mysqli_query($connection, $strQuery);
            if ($query) {
                mysqli_commit($connection);
                echo "<script language=javascript>alert('Berhasil Menambah Data Usaha');</script>";
            } else {
                mysqli_rollback($connection);
                echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menambah Data Usaha');</script>";
            }
        }


	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../datausaha_tambah.php'</script>";
	mysqli_close($connection);
?>