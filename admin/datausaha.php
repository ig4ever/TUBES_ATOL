<?php
	require "../php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'Admin')
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Admin Page</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:300,400' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="info">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <!--<img src="../img/logo.png" width="60px" />-->
                        <a href="#" class="simple-text">
                        Admin
                    </a>
                    </div>
                    <ul class="nav">
                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard" style="font-size: 18px;"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="pemilikusaha.php">
                                <i class="fa fa-user" style="font-size: 18px;"></i>
                                <p>Pemilik Usaha</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="datausaha.php">
                                <i class="fa fa-industry" style="font-size: 18px;"></i>
                                <p>Data Usaha</p>
                            </a>
                        </li>
                        <li>
                            <a href="kecamatan.php">
                                <i class="fa fa-tags" style="font-size: 18px;"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li>
                            <a href="kelurahan.php">
                                <i class="fa fa-info" style="font-size: 18px;"></i>
                                <p>Kelurahan</p>
                            </a>
                        </li>
                        <li>
                            <a href="sektorusaha.php">
                                <i class="fa fa-paperclip" style="font-size: 18px;"></i>
                                <p>Sektor Usaha</p>
                            </a>
                        </li>
                        <li>
                            <a href="skalausaha.php">
                                <i class="fa fa-paperclip" style="font-size: 18px;"></i>
                                <p>Skala Usaha</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Data Usaha</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="profil_edit.php">
                                        <p>
                                            <i class="fa fa-user-circle" style="font-size: 18px;"></i> Hallo,
                                            <?php echo $_SESSION['admin_nama'];?>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <a href="datausaha_tambah.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#search" class="btn btn-info pull-right" style="margin-right: 8px;"><i class="fa fa-search"></i></a>
                                        <!-- Modal Search -->
                                        <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form method="GET" action="datausaha.php">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Masukkan Nama Perusahaan</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Perusahaan</label>
                                                                <input type="text" class="form-control border-input" name="nama" placeholder="Nama Perusahaan" />
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
                                        <?php
                                            if(isset($_GET['nama'])){
                                        ?>
                                            <a href="datausaha.php" class="btn btn-info pull-right" style="margin-right: 8px;"><i class="fa fa-arrow-left"></i></a>
                                            <?php
                                            }
                                        ?>
                                                <h4 class="title">Data Perusahaan</h4>
                                                <p class="category">List dari semua perusahaan yang terdaftar</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>ID</th>
                                                <th>Nama Usaha</th>
                                                <th>Produk Usaha</th>
                                                <th>Produk Utama</th>
                                                <th>Alamat</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(isset($_GET['nama'])){
                                                        $strQuery = "SELECT p.id_usaha, p.nama_usaha, p.produk_usaha, p.produk_utama,
                                                        p.alamat, p.telp,p.latitude, p.longitude,p.gambar1, p.gambar2,p.gambar3, p.gambar4,p.gambar5,
                                                        k.NamaKec, kel.Namakel,sk.NamaSkala, su.NamaSektor
                                                        FROM data_usaha p INNER JOIN login l ON p.id_login = l.login_id 
                                                        INNER JOIN kecamatan k ON p.Kecamatan = k.Idkec 
                                                        INNER JOIN kelurahan kel ON p.Kelurahan = kel.idkel 
                                                        INNER JOIN skala_usaha sk ON p.Skala_Usaha = sk.id_skala
                                                        INNER JOIN sektor_usaha su ON p.Sektor_Usaha = su.id_Sektor                                                   
                                                        WHERE nama_usaha LIKE '%$_GET[nama]%' ORDER BY id_usaha DESC";
                                                    }else {
                                                        $strQuery = "SELECT p.id_usaha, p.nama_usaha, p.produk_usaha, p.produk_utama,
                                                        p.alamat, p.telp,p.latitude, p.longitude,p.gambar1, p.gambar2,p.gambar3, p.gambar4,p.gambar5,
                                                        k.NamaKec, kel.Namakel,sk.NamaSkala, su.NamaSektor
                                                        FROM data_usaha p INNER JOIN login l ON p.id_login = l.login_id 
                                                        INNER JOIN kecamatan k ON p.Kecamatan = k.Idkec 
                                                        INNER JOIN kelurahan kel ON p.Kelurahan = kel.idkel 
                                                        INNER JOIN skala_usaha sk ON p.Skala_Usaha = sk.id_skala
                                                        INNER JOIN sektor_usaha su ON p.Sektor_Usaha = su.id_Sektor 
                                                        ORDER BY id_usaha DESC;";
                                                    }
                                                    $query = mysqli_query($connection, $strQuery);
                                                    $i = 0;
                                                    while($result = mysqli_fetch_assoc($query)){
                                                        echo "<tr>";
                                                        echo "<td>$result[id_usaha]</td>";
                                                        echo "<td>$result[nama_usaha]</td>";
                                                        echo "<td>$result[produk_usaha]</td>";
                                                        echo "<td>$result[produk_utama]</td>";
                                                        echo "<td>$result[alamat]</td>";
//                                                        echo "<td><a href=kelurahan.php?pemilikusaha=$result[perusahaan_id]>List Lowongan</a></td>";
                                                        echo "<td><a href=# data-toggle=modal data-target=#detail$i>Detail</a>";
                                                        echo "&nbsp;&nbsp;&nbsp;";
                                                        echo "<a href='datausaha_edit.php?id=$result[id_usaha]'>Edit</a>";
                                                        echo "&nbsp;&nbsp;&nbsp;";
                                                        echo "<a href=# data-toggle=modal data-target=#delete$i>Delete</a></td>";
                                                        echo "</tr>";
                                                ?>
                                                    <!-- Modal Detail-->
                                                    <div class="modal fade" id="detail<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                    echo "$result[NamaKec]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Kelurahan</b><br/>
                                                                    <?php
                                                                    echo "$result[Namakel]";
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
                                                                    echo "$result[NamaSkala]";
                                                                    ?>
                                                                    <br/><br/>

                                                                    <b>Sektor Usaha</b><br/>
                                                                    <?php
                                                                    echo "$result[NamaSektor]";
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
                                                                        <input type="hidden" name="login_id" value="<?php echo " $result[id_usaha] ";?>" />
                                                                        <input type="submit" value="Yes" class="btn btn-info btn-fill"/>
                                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
                                                    <?php
                                                        $i++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="fa fa-heart heart"></i>
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
            $('#detail<?php echo $j;?>').appendTo("body")
            $('#delete<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
    </body>

    </html>