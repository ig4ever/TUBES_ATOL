<?php
	require "../php/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>ATOL</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/index.css" rel="stylesheet" />
        <link href="../css/login.css" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="../font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200" style="color: #59ABE3;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand" style="color: #FFFFFF;">
                        Sistem Informasi Geografis Potensi Usaha
                        di Kota Bandung
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false" style="color: #FFFFFF; background-color: #00B16A; border-radius: 10px;">
                                Pemilik Usaha
                            </a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dLabel">
                                <li>
                                    <a href="login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="signup.php">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image: url('../img/2.jpg')">
                </div>
                 <div class="container" style="opacity: .95;">
                    <div style="margin-top: 128px;">
                        <form class="form-horizontal" method="POST" action="php/pemilikusaha_tambah_datausaha.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;">
                            <!--<img src="img/logo.png" width="90px" style="margin-bottom: 20px;"/>-->
                            <h2 class="login-text">Daftar sebagai <b>Pemilik Usaha</b></h2>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Nama</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="nama" placeholder="Nama" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">No KTP</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="noKtp" placeholder="No. KTP" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Email</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="email" placeholder="Email" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Password</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" name="password" placeholder="Password" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Konfirmasi Password</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Alamat</label>
                                <div class="col-md-4">
                                    <input id="autocomplete" class="form-control" type="text" name="alamat" placeholder="Alamat" onfocus="geolocate()" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Tempat & Tanggal Lahir</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" name="tempat" placeholder="Tempat" required/>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control" type="date" name="ttl" placeholder="Tanggal Lahir" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Upload KTP</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="file" name="file_ktp" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-4 col-md-4">
                                    <input class="btn btn-primary" name="submit" type="submit" value="Daftar" style="padding: 14px 20px; margin-top: 20px;"
                                           required/>
                                </div>
                            </div>
                            <input class="form-control" type="hidden" name ="keterangan" value="" required/>
                            <input class="form-control" type="hidden" name="telepon" value="" required/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/modernizr.js"></script>
        <script>
            // This example displays an address form, using the autocomplete feature
            // of the Google Places API to help users fill in the information.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
//            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2NbKAHSlL80GRLVCSiNXJpavto1Z5b9w&libraries=places">

            var placeSearch, autocomplete;
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