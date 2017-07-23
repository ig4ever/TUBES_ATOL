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
                        <li class="active">
                            <a href="pemilikusaha.php">
                                <i class="fa fa-user" style="font-size: 18px;"></i>
                                <p>Pemilik Usaha</p>
                            </a>
                        </li>
                        <li>
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
                            <a class="navbar-brand" href="#">Pemilik Usaha</a>
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
                    <form method="POST" action="php/pemilikusaha_tambah_proses.php" enctype="multipart/form-data" >
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
                                                        <input type="text" class="form-control border-input" name="noKtp" placeholder="No. KTP" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control border-input" name="password" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 34px;">
                                                    <div class="form-group">
                                                        <label>Konfirmasi Password</label>
                                                        <input type="password" class="form-control border-input" name="konfirmasi_password" placeholder="Konfirmasi Password" />
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
                                                        <input type="text" class="form-control border-input" name="nama" placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" id="autocomplete" class="form-control border-input" name="alamat" placeholder="Alamat" onfocus="geolocate()"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" class="form-control border-input" name="tempat" placeholder="Tempat Lahir"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control border-input" name="ttl" placeholder="Tanggal Lahir" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control border-input" name="aktifasi">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Belum Aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control border-input" name="email" placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" class="form-control border-input" name="telepon" placeholder="Telepon" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control border-input" name="keterangan" placeholder="Keterangan"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 34px;">
                                                    <div class="form-group">
                                                        <label>Foto KTP </label>
                                                        <input type="file" class="form-control border-input" name="photo_ktp" />
                                                    </div>
                                                </div>

                                                <div class="text-center" style="margin-bottom: 34px;">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
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
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#delete<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
        <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            //            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2NbKAHSlL80GRLVCSiNXJpavto1Z5b9w&libraries=places">

            var placeSearch, autocomplete,autocompletekota;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initAutocomplete() {
                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});

                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);
            }

            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();

                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            }

            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.

            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                        });
                        autocomplete.setBounds(circle.getBounds());
                    });
                }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcX8HWjyUQDWAu60DoUJ-YN4vaprVtRBo&libraries=places&callback=initAutocomplete"
                async defer></script>
    </body>

    </html>