<?php
    require "../../php/connection.php";
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encPassword = md5($password);

    $strQuery = "SELECT l.login_id,l.no_ktp,l.login_role,p.nama,p.aktifasi,p.kode,p.pemilik_usaha_id FROM login l INNER JOIN pemilik_usaha p ON p.pemilik_usaha_id=l.login_id 
    WHERE l.No_Ktp = '$username' AND l.password='$encPassword' AND p.aktifasi='Aktif';";
    $query = mysqli_query($connection, $strQuery);
    if ($query) {
        $thereIsAUser = mysqli_num_rows($query);
        if ($thereIsAUser == 0) {
            echo "<script language=javascript>alert('Username atau Password Tidak Cocok');</script>";
            echo "<script language=javascript>document.location.href='../login.php'</script>";
        } else {
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $kode = $result['kode'];
            $nama = $result['nama'];
            $id = $result['pemilik_usaha_id'];
            $login_role = $result['login_role'];
            if($login_role === "Pemilik Usaha") {
                $strQuery = "SELECT * FROM pemilik_usaha WHERE kode = '$kode'";
                $query = mysqli_query($connection, $strQuery);
                if ($query) {
                    $thereIsAnUser = mysqli_num_rows($query);
                    if ($thereIsAnUser == 0) {
                        echo "<script language=javascript>alert('Pemilik Usaha Tidak Ditemukan');</script>";
                        echo "<script language=javascript>document.location.href='../login.php'</script>";
                    }
                    else if ($kode == null) {
                        echo "<script language=javascript>alert('Akun Belum Diaktifkan');</script>";
                        echo "<script language=javascript>document.location.href='../login.php'</script>";
                    }else{
                        $_SESSION['login_role'] = $login_role;
                        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        $_SESSION['kode'] = $kode;
                        $_SESSION['nama'] = $nama;
                        $_SESSION['id'] = $id;
                        echo "<script language=javascript>document.location.href='../dashboard.php'</script>";
                    }
                } else {
                    echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
                    echo "<script language=javascript>document.location.href='../login.php'</script>";
                }
            } else {
                echo "<script language=javascript>alert('Anda Tidak Terdaftar Sebagai Pemilik Usaha');</script>";
                echo "<script language=javascript>document.location.href='../login.php'</script>";
            }
        }
    } else {
        echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
        echo "<script language=javascript>document.location.href='../login.php'</script>";
    }

    mysqli_close($connection);
?>