<?php
    require "../../php/connection.php";

    $q = intval($_GET['q']);
    $sql = "SELECT l.login_id, l.no_ktp,p.nama,p.pemilik_usaha_id FROM login l INNER JOIN pemilik_usaha p ON p.pemilik_usaha_id=l.login_id
        WHERE pemilik_usaha_id = '" . $q . "'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "$row[nama]";
    }
?>
