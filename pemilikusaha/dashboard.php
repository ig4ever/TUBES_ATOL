<?php
	require "../php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'Pemilik Usaha')
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Pemilik Usaha</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/themify-icons.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:300,400,600,800' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="main-panel" style="float: none; width: 100%;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                            <a class="navbar-brand" href="#" style="font-weight: 800;">ATOL</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left" style="margin-left: 56px;">
                                <li class="active">
                                    <a href="dashboard.php">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="datausaha_tambah.php">
                                        Tambah Data Usaha
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#search">Cari Data Usaha</a>
                                    <!-- Modal Search -->
                                    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <form method="GET" action="dashboard.php">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Masukkan Nama Usaha</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama Usaha</label>
                                                            <input type="text" class="form-control border-input" name="nama" placeholder="Nama Usaha" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info btn-fill">Search</button>
                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="profil_edit.php">
                                        <p>
                                            <i class="fa fa-user-circle" style="font-size: 18px;"></i> Hallo,
                                            <?php echo $_SESSION['nama'];?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="../php/logout.php">
                                        <i class="fa fa-sign-out"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                                if(isset($_GET['nama'])){
                                    $strQuery = "SELECT l.login_id, p.pemilik_usaha_id , p.nama, p.email, p.alamat, p.no_telp, p.keterangan,d.id_usaha,
                                    d.nama_usaha,d.latitude,d.longitude, d.produk_usaha, d.produk_utama, d.alamat,d.telp,d.gambar1,d.gambar2,d.gambar3,d.gambar4,d.gambar5,
                                    kec.namakec,kel.namakel,s.namaskala,sk.namasektor
                                    FROM login l INNER JOIN pemilik_usaha p ON l.login_id = p.pemilik_usaha_id
                                    INNER JOIN data_usaha d ON l.login_id = d.id_login 
                                    INNER JOIN kecamatan kec ON d.kecamatan = kec.idkec 
                                    INNER JOIN kelurahan kel ON d.kelurahan = kel.idkel 
                                    INNER JOIN skala_usaha s ON d.skala_usaha = s.id_skala 
                                    INNER JOIN sektor_usaha sk ON d.sektor_usaha = sk.id_sektor 
                                    WHERE d.nama_usaha LIKE '%$_GET[nama]%' AND p.pemilik_usaha_id = '$_SESSION[id]' ORDER BY id_usaha DESC";
                                }else {
                                        $strQuery = "SELECT l.login_id, p.pemilik_usaha_id , p.nama, p.email, p.alamat, p.no_telp, p.keterangan,d.id_usaha,
                                    d.nama_usaha,d.latitude,d.longitude, d.produk_usaha, d.produk_utama, d.alamat,d.telp,d.gambar1,d.gambar2,d.gambar3,d.gambar4,d.gambar5,
                                    kec.namakec,kel.namakel,s.namaskala,sk.namasektor
                                    FROM login l INNER JOIN pemilik_usaha p ON l.login_id = p.pemilik_usaha_id
                                    INNER JOIN data_usaha d ON l.login_id = d.id_login 
                                    INNER JOIN kecamatan kec ON d.kecamatan = kec.idkec 
                                    INNER JOIN kelurahan kel ON d.kelurahan = kel.idkel 
                                    INNER JOIN skala_usaha s ON d.skala_usaha = s.id_skala 
                                    INNER JOIN sektor_usaha sk ON d.sektor_usaha = sk.id_sektor 
                                    WHERE p.pemilik_usaha_id = '$_SESSION[id]' 
                                    ORDER BY id_usaha DESC";
                                }
                                $query = mysqli_query($connection, $strQuery);
                                $i = 0;
                                while($result = mysqli_fetch_assoc($query)){
                            ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="title">
                                                        <?php
                                                            echo "<a href=# data-toggle=modal data-target=#detail$i>$result[nama_usaha]</a>";
                                                        ?>
                                                    </h4>
                                                </div>

                                                <div class="col-md-12">
                                                    <p class="category">
                                                       <p class="category">           
                                                            <br/>
                                                            <i class="fa fa-map-marker icon-info"></i><?php echo $result['alamat']?> &nbsp;&nbsp;
                                                            <i class="fa fa-tags icon-info"></i><?php echo $result['telp']?> <br/>
                                                        </p>
                                                    </p>
                                                </div>
                                                <div class="col-md-12" style="text-align: left;">
                                                    <p class="category">                                                        
                                                        <?php
                                                            echo "<a href=datausaha_edit.php?id=$result[id_usaha]><i class=\"fa fa-pencil icon-success\"></i>Edit</a>&nbsp;&nbsp;&nbsp;";
                                                            echo "<a href=# data-toggle=modal data-target=#delete$i><i class=\"fa fa-trash icon-warning\"></i>Delete</a>";
                                                        ?>
                                                    </p>

                                                    <div style="a" class="modal fade" id="detail<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Detail Data Usaha</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <b>ID</b><br/>
                                                                    <?php
                                                                    echo "$result[id_usaha]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Nama Usaha</b><br/>
                                                                    <?php
                                                                    echo "$result[nama_usaha]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Produk Usaha</b><br/>
                                                                    <?php
                                                                    echo "$result[produk_usaha]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Produk Utama</b><br/>
                                                                    <?php
                                                                    echo "$result[produk_utama]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Alamat</b><br/>
                                                                    <?php
                                                                    echo "$result[alamat]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Kecamatan</b><br/>
                                                                    <?php
                                                                    echo "$result[namakec]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Kelurahan</b><br/>
                                                                    <?php
                                                                    echo "$result[namakel]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Telepon</b><br/>
                                                                    <?php
                                                                    echo "$result[telp]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Latitude</b><br/>
                                                                    <?php
                                                                    echo "$result[latitude]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Longitude</b><br/>
                                                                    <?php
                                                                    echo "$result[longitude]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Skala Usaha</b><br/>
                                                                    <?php
                                                                    echo "$result[namaskala]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Sektor Usaha</b><br/>
                                                                    <?php
                                                                    echo "$result[namasektor]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Gambar 1</b><br/>
                                                                    <?php
                                                                    echo "$result[gambar1]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Gambar 2</b><br/>
                                                                    <?php
                                                                    echo "$result[gambar2]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Gambar 3</b><br/>
                                                                    <?php
                                                                    echo "$result[gambar3]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Gambar 4</b><br/>
                                                                    <?php
                                                                    echo "$result[gambar4]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Gambar 5</b><br/>
                                                                    <?php
                                                                    echo "$result[gambar5]";
                                                                    ?>
                                                                    <br/><br/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Delete -->
                                                    <div class="modal fade " id="delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <form method="POST" action="php/datausaha_delete_proses.php">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel">Apakah Anda Yakin ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="id" value="<?php echo " $result[id_usaha] ";?>" />
                                                                        <input type="submit" value="Yes" class="btn btn-primary btn-fill"/>
                                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Team</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/dashboard.js" type="text/javascript"></script>
        <!--  Modal  -->
        <script>
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#delete<?php echo $j;?>').appendTo("body")
            $('#detail<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
    </body>

    </html>