<?php
    date_default_timezone_set('Etc/UTC');
    require "../../php/connection.php";
    require_once('../../library/class.phpmailer.php'); //menginclude librari phpmailer
    require '../../library/PHPMailerAutoload.php';

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
        if ($status == "Aktif") {
            //define('ROOT', 'http://localhost/TUBES_ATOL/TUBES_ATOL/pemilikusaha/');
            define('ROOT', 'http://tralala.azurewebsites.net/pemilikusaha/');

            //$id = date('is');
            $kode = md5(uniqid(rand()));
            //$password = md5($password);

            $mail = new PHPMailer();
            $mail->IsSMTP();    // menggunakan SMTP
            $mail->SMTPDebug = 2;   // mengaktifkan debug SMTP

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            $mail->SMTPAuth = true;   // mengaktifkan Autentifikasi SMTP
            $mail->Host = 'smtp.gmail.com'; // Gunakan Ip Shared Address Hosting Anda
            $mail->Port = 587;
            $mail->Username = "andrewnaker169@gmail.com"; // username email akun
            $mail->Password = "storyofmylove";        // password akun

            $mail->SetFrom('andrewnaker169@gmail.com', "Hello '$nama'");

            $mail->Subject = "Hello";
            $mail->Body = 'Klik link berikut untuk verifikasi dan mengaktifkan akun : ';
            $mail->Body .= ROOT . "loginActivated.php?email=" . $email . "&kode=$kode&username=" . $username;

            $address = $email; //email tujuan
            $mail->AddAddress($address, "Hello (Reciever name)");

            $strQuery = "UPDATE pemilik_usaha SET 
            nama = '$nama', 
            alamat = '$alamat',  
            email = '$email', 
            tempat_lahir = '$tempat_lahir', 
            tanggal_lahir = '$tanggal_lahir', 
            no_telp = '$telepon',  
            keterangan = '$keterangan',
            kode = '$kode'
            WHERE pemilik_usaha_id = $id";
            $query = mysqli_query($connection, $strQuery);
            if ($query) {
                if (!empty($password)) {
                    $encPassword = md5($password);
                    $strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
                } else {
                    $strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
                }

                $query = mysqli_query($connection, $strQuery);
                if ($query && $mail->Send()) {
                    mysqli_commit($connection);
                    echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha');</script>";
                } else {
                    mysqli_rollback($connection);
                    echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
                }
            }
        }else{
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
            if ($query) {
                if (!empty($password)) {
                    $encPassword = md5($password);
                    $strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
                } else {
                    $strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
                }

                $query = mysqli_query($connection, $strQuery);
                if ($query) {
                    mysqli_commit($connection);
                    echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha');</script>";
                } else {
                    mysqli_rollback($connection);
                    echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
                }
            }
        }
	}else {
        $target_dir = "../../upload/cv/";
        $photoKtp = str_replace(" ", "", $nama);
        $temp = explode(".", $_FILES["photo_ktp"]["name"]);
        $photoKtp = strtolower($photoKtp . date('YmdHis') . "." . end($temp));
        $target_file = $target_dir . basename($photoKtp);
        if (move_uploaded_file($_FILES['photo_ktp']['tmp_name'], $target_file) && $status == "Aktif") {
            define('ROOT', 'http://localhost/TUBES_ATOL/TUBES_ATOL/pemilikusaha/');
            //define('ROOT', 'http://tralala.azurewebsites.net/pemilikusaha/');

//            $id = date('is');
            $kode = md5(uniqid(rand()));
//            $password = md5($password);

            $mail = new PHPMailer();
            $mail->IsSMTP();    // menggunakan SMTP
            $mail->SMTPDebug = 2;   // mengaktifkan debug SMTP

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            $mail->SMTPAuth = true;   // mengaktifkan Autentifikasi SMTP
            $mail->Host = 'smtp.gmail.com'; // Gunakan Ip Shared Address Hosting Anda
            $mail->Port = 587;
            $mail->Username = "andrewnaker169@gmail.com"; // username email akun
            $mail->Password = "storyofmylove";        // password akun

            $mail->SetFrom('andrewnaker169@gmail.com', "Hello '$nama'");

            $mail->Subject = "Hello";
            $mail->Body = 'Klik link berikut untuk verifikasi dan mengaktifkan akun : ';
            $mail->Body .= ROOT . "loginActivated.php?email=" . $email . "&kode=$kode&username=" . $username;

            $address = $email; //email tujuan
            $mail->AddAddress($address, "Hello (Reciever name)");

            $strQuery = "UPDATE pemilik_usaha SET 
            nama = '$nama', 
            alamat = '$alamat',  
            email = '$email', 
            tempat_lahir = '$tempat_lahir', 
            tanggal_lahir = '$tanggal_lahir', 
            no_telp = '$telepon',  
            keterangan = '$keterangan',  
            photo_ktp = '$photoKtp',
            kode = '$kode'
            WHERE pemilik_usaha_id = $id";
            $query = mysqli_query($connection, $strQuery);
            if ($query) {
                if (!empty($password)) {
                    $encPassword = md5($password);
                    $strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
                } else {
                    $strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
                }

                $query = mysqli_query($connection, $strQuery);
                if ($query && $mail->Send()) {
                    mysqli_commit($connection);
                    echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha Silahkan Cek Email');</script>";
                } else {
                    mysqli_rollback($connection);
                    echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
                }
            }
        }else {
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
                if ($query) {
                    if (!empty($password)) {
                        $encPassword = md5($password);
                        $strQuery = "UPDATE login SET no_ktp = '$username', password = '$encPassword' WHERE login_id = $login_id";
                    } else {
                        $strQuery = "UPDATE login SET no_ktp = '$username' WHERE login_id = $login_id";
                    }

                    $query = mysqli_query($connection, $strQuery);
                    if ($query) {
                        mysqli_commit($connection);
                        echo "<script language=javascript>alert('Berhasil Mengupdate Data Pemilik Usaha');</script>";
                    } else {
                        mysqli_rollback($connection);
                        echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Pemilik Usaha');</script>";
                    }
                }
            }
        }

	mysqli_autocommit($connection, TRUE);
	echo "<script language=javascript>document.location.href='../pemilikusaha_edit.php?id=$id' </script>";
	mysqli_close($connection);
?>