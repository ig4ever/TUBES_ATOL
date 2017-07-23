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

    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $nama = "";
        $alamat = "";
        $email = "";
        $tempat_lahir = "";
        $tanggal_lahir = "";
        $telepon = "";
        $keterangan = "";
        $status = "";
        $photoKtp = "";
        $login_id = "";
        $username = "";
        $password = "";
        $strQuery = "SELECT cp.pemilik_usaha_id, cp.nama, 
                                                            cp.email, k.no_Ktp,k.login_id,k.password, cp.alamat,
                                                            cp.tempat_lahir, cp.tanggal_lahir, cp.no_telp,
                                                            cp.keterangan, cp.photo_Ktp, cp.aktifasi
                        FROM pemilik_usaha cp INNER JOIN login k ON cp.pemilik_usaha_id = k.login_id
                        WHERE cp.pemilik_usaha_id = '$id'";
        $query = mysqli_query($connection, $strQuery);
        if($query){
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $id = $result['pemilik_usaha_id'];
            $nama = $result['nama'];
            $alamat = $result['alamat'];
            $email = $result['email'];
            $tempat_lahir = $result['tempat_lahir'];
            $tanggal_lahir = $result['tanggal_lahir'];
            $status = $result['aktifasi'];
            $photoKtp = $result['photo_Ktp'];
            $telepon = $result['no_telp'];
            $keterangan = $result['keterangan'];
            $login_id = $result['login_id'];
            $username = $result['no_Ktp'];
            $password = $result['password'];
        }
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
        <link href='https://fonts.googleapis.com/css?family=Muli:300,400' rel='stylesheet' type='text/css'>
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
                                <li>
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
                    <form method="POST" action="php/pemilikusaha_edit_proses.php" enctype="multipart/form-data" >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Login Info</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>No. KTP</label>
                                                        <input type="text" class="form-control border-input" name="username" placeholder="No. KTP" value="<?php echo $username;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control border-input" name="password" placeholder="Biarkan kosong jika anda tidak ingin mengganti passwornya"/>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Data Pemilik Usaha</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" class="form-control border-input" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" id="autocomplete" class="form-control border-input" name="alamat" placeholder="Alamat" value="<?php echo $alamat;?>" onfocus="geolocate()"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" class="form-control border-input" name="tempat" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir;?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control border-input" name="ttl" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir;?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control border-input" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" class="form-control border-input" name="telepon" placeholder="Telepon" value="<?php echo $telepon;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control border-input" name="keterangan" placeholder="Keterangan" value="<?php echo $keterangan;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 34px;">
                                                    <div class="form-group">
                                                        <label>Foto KTP (Anda sudah mempunyai Foto KTP <?php echo $photoKtp;?>)</label>
                                                        <input type="file" class="form-control border-input" name="photo_ktp"/>
                                                    </div>
                                                </div>

                                                <div class="text-center" style="margin-bottom: 34px;">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                                                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                                                    <input type="hidden" name="login_id" value="<?php echo $login_id;?>" />
                                                    <button type="submit" name="submit" class="btn btn-info btn-fill btn-wd">Submit Data</button>
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
            $('#search').appendTo("body")
        </script>
    </body>

    </html>