<?php
    require "../../php/connection.php";
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encPassword = md5($password);

    $strQuery = "SELECT * FROM pemilik_usaha WHERE No_Ktp = '$username' AND password='$encPassword' AND aktifasi='Y'";
    $query = mysqli_query($connection, $strQuery);
    if ($query) {
        $thereIsAUser = mysqli_num_rows($query);
        if ($thereIsAUser == 0) {
            echo "<script language=javascript>alert('Username atau Password Tidak Cocok');</script>";
            echo "<script language=javascript>document.location.href='../login.php'</script>";
        } else {
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $kode = $result['kode'];
            //$login_role = $result['login_role'];
            //if($login_role === "Perusahaan") {
            $strQuery = "SELECT * FROM pemilik_usaha WHERE kode = '$kode'";
            $query = mysqli_query($connection, $strQuery);
            if ($query) {
                $thereIsAnUser = mysqli_num_rows($query);
                if ($thereIsAnUser == 0) {
                    echo "<script language=javascript>alert('Data Perusahaan tidak Ditemukan');</script>";
                    echo "<script language=javascript>document.location.href='../login.php'</script>";
                } else {
                    //$_SESSION['login_role'] = $login_role;
                    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $_SESSION['kode'] = $result['kode'];
                    $_SESSION['nama'] = $result['nama'];
                    echo "<script language=javascript>document.location.href='../kelurahan.php'</script>";
                }
            } else {
                echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
                echo "<script language=javascript>document.location.href='../login.php'</script>";
            }
            /*} else {
                echo "<script language=javascript>alert('Anda Tidak Terdaftar Sebagai Admin Perusahaan');</script>";
                echo "<script language=javascript>document.location.href='../login.php'</script>";
            }*/
        }
    } else {
        echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
        echo "<script language=javascript>document.location.href='../login.php'</script>";
    }

    mysqli_close($connection);
?>