<?php
    require "../../php/connection.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $strQuery = "UPDATE skala_usaha SET namaskala = '$nama' WHERE id_skala = $id";
    $query = mysqli_query($connection, $strQuery);
    if(!$query){
        echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Skala Usaha');</script>";
    }

    echo "<script language=javascript>document.location.href='../skalausaha.php'</script>";
    mysqli_close($connection);
?>