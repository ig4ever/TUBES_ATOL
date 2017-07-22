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

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $nama = "";
        $usaha = "";
        $utama = "";
        $alamat = "";
        $kecamatan = "";
        $kelurahan = "";
        $telepon = "";
        $latitude = "";
        $longitude = "";
        $skala = "";
        $sektor = "";
        $gambar1 = "";
        $gambar2 = "";
        $gambar3 = "";
        $gambar4 = "";
        $gambar5 = "";

        $username = "";
        $pemilik = "";

        $strQuery = "SELECT p.id_usaha, p.nama_usaha, p.produk_usaha, p.produk_utama,
                                                        p.alamat, p.telp,p.latitude, p.longitude,p.gambar1, p.gambar2,p.gambar3, p.gambar4,p.gambar5,
                                                        k.NamaKec, kel.Namakel,sk.NamaSkala, su.NamaSektor,l.no_Ktp,pu.nama
                                                        FROM data_usaha p INNER JOIN login l ON p.id_login = l.login_id 
                                                        INNER JOIN kecamatan k ON p.Kecamatan = k.Idkec 
                                                        INNER JOIN kelurahan kel ON p.Kelurahan = kel.idkel 
                                                        INNER JOIN skala_usaha sk ON p.Skala_Usaha = sk.id_skala
                                                        INNER JOIN sektor_usaha su ON p.Sektor_Usaha = su.id_Sektor
                                                        INNER JOIN pemilik_usaha pu ON l.login_id = pu.pemilik_usaha_id
                    WHERE p.id_usaha = '$id'";
        $query = mysqli_query($connection, $strQuery);
        if($query){
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $id = $result['id_usaha'];
            $nama = $result['nama_usaha'];
            $usaha = $result['produk_usaha'];
            $utama = $result['produk_utama'];
            $alamat = $result['alamat'];
            $kecamatan = $result['NamaKec'];
            $kelurahan = $result['Namakel'];
            $telepon = $result['telp'];
            $latitude = $result['latitude'];
            $longitude = $result['longitude'];
            $skala = $result['NamaSkala'];
            $sektor = $result['NamaSektor'];
            $gambar1 = $result['gambar1'];
            $gambar2 = $result['gambar2'];
            $gambar3 = $result['gambar3'];
            $gambar4 = $result['gambar4'];
            $gambar5 = $result['gambar5'];
            $username = $result['no_Ktp'];
            $pemilik = $result['nama'];
        }
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Lowker</title>
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
                        Lowker Admin
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
                            <a class="navbar-brand" href="#">Perusahaan</a>
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
                    <form method="POST" action="php/datausaha_edit_proses.php" enctype="multipart/form-data" >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Data Usaha</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <input type="hidden" class="form-control border-input" name="nama" placeholder="Nama Usaha"  value="<?php echo $nama;?>"/>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>No. KTP : <?php echo $username;?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Pemilik Usaha : <?php echo $pemilik;?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Usaha</label>
                                                        <input type="text" class="form-control border-input" name="nama" placeholder="Nama Usaha"  value="<?php echo $nama;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Produk Usaha</label>
                                                        <input type="text" class="form-control border-input" name="usaha" placeholder="Produk Usaha"  value="<?php echo $usaha;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Produk Utama</label>
                                                        <input type="text" class="form-control border-input" name="utama" placeholder="Produk Utama" value="<?php echo $utama;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" class="form-control border-input" name="alamat" placeholder="Alamat" value="<?php echo $alamat;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control border-input" name="kecamatan" placeholder="Alamat" value="<?php echo $kecamatan;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <input type="text" class="form-control border-input" name="kelurahan" placeholder="Alamat" value="<?php echo $kelurahan;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" class="form-control border-input" name="telepon" placeholder="Alamat" value="<?php echo $telepon;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Latitude</label>
                                                        <input type="text" class="form-control border-input" name="latitude" placeholder="Alamat" value="<?php echo $latitude;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Longitude</label>
                                                        <input type="text" class="form-control border-input" name="longitude" placeholder="Alamat" value="<?php echo $longitude;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Skala Usaha</label>
                                                        <input type="text" class="form-control border-input" name="skala" placeholder="Alamat" value="<?php echo $skala;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sektor Usaha</label>
                                                        <input type="text" class="form-control border-input" name="sektor" placeholder="Alamat" value="<?php echo $sektor;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar 1</label>
                                                        <input type="text" class="form-control border-input" name="gambar1" placeholder="Alamat" value="<?php echo $gambar1;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar 2</label>
                                                        <input type="text" class="form-control border-input" name="gambar2" placeholder="Alamat" value="<?php echo $gambar2;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar 3</label>
                                                        <input type="text" class="form-control border-input" name="gambar3" placeholder="Alamat" value="<?php echo $gambar3;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar 4</label>
                                                        <input type="text" class="form-control border-input" name="gambar4" placeholder="Alamat" value="<?php echo $gambar4;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar 5</label>
                                                        <input type="text" class="form-control border-input" name="gambar5" placeholder="Alamat" value="<?php echo $gambar5;?>"/>
                                                    </div>
                                                </div>

                                                <div class="text-center" style="margin-bottom: 34px;">
                                                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                                                    <input type="hidden" name="login_id" value="<?php echo $login_id;?>" />
                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Submit Data</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Lowker Team</a>
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
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
    </body>

    </html>