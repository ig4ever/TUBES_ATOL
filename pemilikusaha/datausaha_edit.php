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
        <title>Pemilik Usaha</title>
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

            function showUser2(str) {
                if (str=="") {
                    document.getElementById("txtHint2").innerHTML="";
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
                        document.getElementById("txtHint2").innerHTML=this.responseText;
                    }
                }
                xmlhttp.open("GET","php/data_usaha_req2.php?q="+str,true);
                xmlhttp.send();
            }
        </script>

        <script src="http://maps.google.com/maps/api/js?key=AIzaSyAqhJ6sg9DMHKhLvWrzUs96NDMemaDXriw&sensor=true"></script>

        <script type="text/javascript">
            function init(){
                var info_window = new google.maps.InfoWindow();
                // menentukan level zoom
                var zoom = 12;

                // menentukan latitude dan longitude
                var pos = new google.maps.LatLng(-6.911717, 107.608060);

                // menentukan opsi peta yang akan di buat
                var options = {
                    'center': pos,
                    'zoom': zoom,
                    'mapTypeId': google.maps.MapTypeId.ROADMAP
                };

                // membuat peta
                var map = new google.maps.Map(document.getElementById('maps'), options);
                info_window = new google.maps.InfoWindow({
                    'content': 'loading...'
                });
            }
            function cari_alamat(){
                // mengambil isi dari textarea dengan id alamat
                var alamat = document.getElementById('alamat').value;

                // membuat geocoder
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode(
                    {'address': alamat},
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var info_window = new google.maps.InfoWindow();

                            // mendapatkan lokasi koordinat
                            var geo = results[0].geometry.location;

                            // set koordinat
                            var pos = new google.maps.LatLng(geo.lat(),geo.lng());

                            // menampilkan latitude dan longitude pada id lat dan lng
                            var lat = document.getElementById('lat').value = geo.lat();
                            var lng = document.getElementById('lng').value = geo.lng();

                            // opsi peta yang akan di tampilkan
                            var option = {
                                center: pos,
                                zoom: 16,
                                mapTypeId:google.maps.MapTypeId.ROADMAP
                            };

                            // membuat peta
                            var map = new google.maps.Map(document.getElementById('maps'),option);
                            info_window = new google.maps.InfoWindow({
                                content: 'loading...'
                            });

                            // menambahkan marker pada peta
                            var marker = new google.maps.Marker({
                                position: pos,
                                title: 'You are here',
                                animation:google.maps.Animation.BOUNCE
                            });
                            marker.setMap(map);

                            // menambahkan event click ketika marker di klik
                            google.maps.event.addListener(marker, 'click', function () {
                                info_window.setContent('<b>'+ this.title +'</b>');
                                info_window.open(map, this);
                            });
                        } else {
                            alert('Lokasi Tidak Ditemukan');
                        }
                    }
                );
            }
            google.maps.event.addDomListener(window, 'load', init);
        </script>
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
                                        Data Usaha
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
                     <form method="POST" action="php/datausaha_edit_proses.php">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Edit Lowongan</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
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
                                                        <input id="alamat" type="text" class="form-control border-input" name="alamat" placeholder="Alamat" value="<?php echo $alamat;?>"/>
                                                        <br>
                                                        <center><input type="button" value="Cari Alamat" onClick="cari_alamat()">
                                                            <br><br>
                                                            <div id="maps" style="width: 800px; height: 400px;"></div></center>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kecamatan</label>
                                                        <select class="form-control border-input" name="kecamatan" onchange="showUser2(this.value)">
                                                            <option value=""></option>
                                                            <?php
                                                            $strQuery = "SELECT idkec,namakec FROM kecamatan";
                                                            $query = mysqli_query($connection, $strQuery);
                                                            while($subresult = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=$subresult[idkec]>$subresult[namakec]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Kelurahan</label>
                                                        <select class="form-control border-input" id="txtHint2" name="kelurahan">
                                                            <option value=""></option>
                                                        </select>
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
                                                        <label>Skala Usaha</label>
                                                        <select class="form-control border-input" name="skala">
                                                            <option value=""></option>
                                                            <?php
                                                            $strQuery = "SELECT id_skala, namaskala FROM skala_usaha";
                                                            $query = mysqli_query($connection, $strQuery);
                                                            $cek = true;
                                                            while($subresult = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=$subresult[id_skala]>$subresult[namaskala]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Sektor Usaha</label>
                                                        <select class="form-control border-input" name="sektor">
                                                            <option value=""></option>
                                                            <?php
                                                            $strQuery = "SELECT id_sektor, namasektor FROM sektor_usaha";
                                                            $query = mysqli_query($connection, $strQuery);
                                                            $cek = true;
                                                            while($subresult = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=$subresult[id_sektor]>$subresult[namasektor]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Gambar</label>
                                                        <input type="file" class="form-control border-input"
                                                               name="img" multiple/>
                                                    </div>
                                                    <div class="text-center" style="margin-bottom: 34px;">

                                                        <div class="text-center" style="margin-bottom: 34px;">
                                                            <input type="hidden" name="id" value="<?php echo $id;?>" />
                                                            <input type="hidden" name="login_id" value="<?php echo $login_id;?>" />
                                                            <input type="hidden" class="form-control border-input"
                                                                   name="longitude" id="lng" value=""/>
                                                            <input type="hidden" class="form-control border-input"
                                                                   name="latitude" id="lat" value=""/>
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
        <script type="text/javascript">
            $('#search').appendTo("body")
        </script>
    </body>

    </html>