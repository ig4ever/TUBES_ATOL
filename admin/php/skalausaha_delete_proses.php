<?php
    require "../../php/connection.php";
    $id = $_POST['id'];

    $strQuery = "DELETE FROM skala_usaha WHERE id_skala = $id";
    $query = mysqli_query($connection, $strQuery);
    if(!$query){
        echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Skala Usaha');</script>";
    }

    echo "<script language=javascript>document.location.href='../skalausaha.php'</script>";
    mysqli_close($connection);
?>