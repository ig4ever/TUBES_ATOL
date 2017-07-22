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
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:300,400' rel='stylesheet' type='text/css'>
        <script>
            function showUser(str) {
                if (str=="") {
                    document.getElementById("txtHint").innerHTML="";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        document.getElementById("txtHint").innerHTML=this.responseText;
                    }
                }
                xmlhttp.open("GET","php/data_usaha_req.php?q="+str,true);
                xmlhttp.send();
            }
        </script>
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
                    <form method="POST" action="php/datausaha_tambah_proses.php" enctype="multipart/form-data" >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Data Usaha</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>No. KTP</label>
                                                        <select class="form-control border-input" name="id_usaha" onchange="showUser(this.value)">
                                                            <option value=""></option>
                                                            <?php
                                                            $strQuery = "SELECT l.login_id, l.no_ktp,p.nama,p.pemilik_usaha_id FROM login l INNER JOIN pemilik_usaha p ON p.pemilik_usaha_id=l.login_id 
                                                            WHERE l.login_role='Pemilik Usaha'";
                                                            $query = mysqli_query($connection, $strQuery);
                                                            $cek = true;
                                                            while($subresult = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=$subresult[login_id]>$subresult[no_ktp]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Pemilik Usaha : <span id="txtHint"></span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Usaha</label>
                                                        <input type="text" class="form-control border-input" name="nama"
                                                               placeholder="Nama Usaha"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Produk Usaha</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="usaha" placeholder="Produk Usaha"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Produk Utama</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="utama" placeholder="Produk Utama"
                                                               />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="alamat" placeholder="Alamat"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="kecamatan" placeholder="Kecamatan"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="kelurahan" placeholder="Kelurahan"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="telepon" placeholder="Telepon"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Latitude</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="latitude" placeholder="Latitude"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Longitude</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="longitude" placeholder="Longitude"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Skala Usaha</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="skala" placeholder="Skala Usaha"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sektor Usaha</label>
                                                        <input type="text" class="form-control border-input"
                                                               name="sektor" placeholder="Sektor Usaha"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input type="file" class="form-control border-input"
                                                               name="img[]" multiple/>
                                                    </div>
                                                <div class="text-center" style="margin-bottom: 34px;">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Submit
                                                        Data
                                                    </button>
                                                </div>
                                                <div class="clearfix"></div>
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
            $('#delete<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
    </body>

    </html>