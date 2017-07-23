<?php
    require "../../php/connection.php";

    $q = intval($_GET['q']);
    $sql = "SELECT kec.idkec,kec.namakec,k.idkel,k.namakel FROM kelurahan k INNER JOIN kecamatan kec ON kec.idkec = k.idkec
            WHERE kec.idkec = '" . $q . "'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=$row[idkel]>$row[namakel]</option>";
        //echo "$row[namakel]";
    }
?>
