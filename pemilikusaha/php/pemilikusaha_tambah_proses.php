<?php
    date_default_timezone_set('Etc/UTC');
	require "../../php/connection.php";
    require_once('../../library/class.phpmailer.php'); //menginclude librari phpmailer
    require '../../library/PHPMailerAutoload.php';


    $nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
    $tempat = $_POST['tempat'];
    $ket = $_POST['keterangan'];
    $ttl = $_POST['ttl'];

	$username = $_POST['noKtp'];
	$password = $_POST['password'];
	$confirm_password = $_POST['konfirmasi_password'];
		
	mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
	mysqli_autocommit($connection, FALSE);

	if($password == $confirm_password){
		$encPassword = md5($password);
		$strQuery = "INSERT INTO login VALUES(null,'$username', '$encPassword', 'Pemilik Usaha')";
		$query = mysqli_query($connection,$strQuery);
		if($_FILES['file_ktp']['size'] != 0){
			$login_id = mysqli_insert_id($connection);
            $target_dir = "../../upload/cv/";
            $cv = str_replace(" ","", $nama);
            $temp = explode(".", $_FILES["file_ktp"]["name"]);
            $cv = strtolower($cv . date('YmdHis') . "." . end($temp));
            $target_file = $target_dir . basename($cv);
            if (move_uploaded_file($_FILES['file_ktp']['tmp_name'], $target_file) && isset($_POST['submit'])) {
                define('ROOT', 'http://localhost/TUBES_ATOL/TUBES_ATOL/pemilikusaha/');

                $id = date('is');
                $kode    = md5(uniqid(rand()));
                $password = md5($password);

                $mail             = new PHPMailer();
                $mail->IsSMTP(); 	// menggunakan SMTP
                $mail->SMTPDebug  = 2;   // mengaktifkan debug SMTP

                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';

                $mail->SMTPAuth   = true;   // mengaktifkan Autentifikasi SMTP
                $mail->Host 	= 'smtp.gmail.com'; // Gunakan Ip Shared Address Hosting Anda
                $mail->Port       = 587;
                $mail->Username   = "andrewnaker169@gmail.com"; // username email akun
                $mail->Password   = "storyofmylove";        // password akun

                $mail->SetFrom('andrewnaker169@gmail.com', "Hello '$nama'");

                $mail->Subject    = "Hello";
                $mail->Body     = 'Klik link berikut untuk verifikasi dan mengaktifkan akun : ';
                $mail->Body     .= ROOT."loginActivated.php?email=".$email."&kode=$kode&username=".$username;

                $address = $email; //email tujuan
                $mail->AddAddress($address, "Hello (Reciever name)");

                $strQuery = "INSERT INTO pemilik_usaha VALUES( 
				'$login_id',
				'$nama', 
				'$email',
				'$alamat', 
				'$tempat', 
				'$ttl',  
				'$telepon',
				'$ket',
				'$cv',
				'Belum Aktif',
				'$kode'
			)";

                $query = mysqli_query($connection, $strQuery);
                if ($mail->Send() && $query) {
                    mysqli_commit($connection);
                    echo "<script language=javascript>alert('Registrasi Berhasil Silahkan Cek Email');</script>";
                    echo "<script language=javascript>document.location.href='../login.php'</script>";
                } else {
                    mysqli_rollback($connection);
                    echo "<script language=javascript>alert('Registrasi Gagal');</script>";
                    echo "<script language=javascript>document.location.href='../signup.php'</script>";
                }
            }
		}else {
			mysqli_rollback($connection);
			echo "<script language=javascript>alert('Lengkapi Formnya');</script>";
			echo "<script language=javascript>document.location.href='../signup.php'</script>";
		}
	}else{
		echo "<script language=javascript>alert('Password Tidak Cocok');</script>";
		echo "<script language=javascript>document.location.href='../signup.php'</script>";
	}
	
	mysqli_autocommit($connection, TRUE);
	mysqli_close($connection);
?>