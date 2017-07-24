<?php
	require "php/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>ATOL</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!--<link href="css/index.css" rel="stylesheet" />-->
        <link href="../css/style.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .map-info-window{
                background:#333;
                border-radius:4px;
                box-shadow:8px 8px 16px #222;
                color:#000;
                max-width:200px;
                max-height:300px;
                text-align:center;
                padding:5px 20px 10px;
                overflow:hidden;
                position:absolute;
                text-transform:uppercase;
            }
        </style>
        <script type="text/javascript"
                src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyAEYngJhtgtGJZOVd5c_G-I83qCK2ntToQ"></script>
        <script type="text/javascript">
            //Mendefinisikan alamat icons yang akan digunakan
            var customIcons = {
                stasiun: {
                    icon: 'icons/stasiun.png'
                },
                monumen: {
                    icon: 'icons/monumen.png'
                },
                museum: {
                    icon: 'icons/museum.png'
                },
                stadion: {
                    icon: 'icons/stadion.png'
                },
                terminal: {
                    icon: 'icons/terminal.png'
                },
                bandara: {
                    icon: 'icons/bandara.png'
                },
                universitas: {
                    icon: 'icons/universitas.png'
                },
                Musik: {
                    icon: 'icons/music.png'
                }

            };

            function load() {
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(-6.911717, 107.608060),
                    zoom: 12,
                    mapTypeId: 'roadmap'
                });
                var infoWindow = new google.maps.InfoWindow;

                // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam datalokasimapsbdg.php
                downloadUrl("datalokasimapsbdg1.php", function(data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName("marker");
                    for (var i = 0; i < markers.length; i++) {
                        var Nama_Usaha = markers[i].getAttribute("Nama_Usaha");
                        var Alamat = markers[i].getAttribute("Alamat");
                        var Produk_Utama = markers[i].getAttribute("produk_utama");
                        var Produk_Usaha = markers[i].getAttribute("produk_usaha");
                        var type = markers[i].getAttribute("Produk_Utama");
                        var point = new google.maps.LatLng(
                            parseFloat(markers[i].getAttribute("Latitude")),
                            parseFloat(markers[i].getAttribute("Longitude")));
                        var html = "<b>" + Nama_Usaha + "</b><br/>" + Alamat + "<br>" + Produk_Utama 
                        + "<br>" + Produk_Usaha;
                        var icon = customIcons[type] || {};
                        var marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            icon: icon.icon

                        });
                        bindInfoWindow(marker, map, infoWindow, html);
                    }
                });
            }

            function bindInfoWindow(marker, map, infoWindow, html) {
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
            }

            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        request.onreadystatechange = doNothing;
                        callback(request, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

            function doNothing() {}
        </script>
    </head>

    <body onload="load()">
        <nav class="navbar navbar-inverse navbar-fixed-top" color-on-scroll="200">
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
                                    <a href="pemilikusaha/login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="pemilikusaha/signup.php">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <center>
                            <div class="row">
                                <div id="map" style="width:1920px; height:1080px"></div>
                            </div>
                            </center>
        <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image: url('img/1.jpg')">
                </div>
                <div class="container">
                    <div class="content">
                        <form method="GET" action="lowongan_list.php">
                            <!--<div class="row">
                                <p>Cari Lowongan Pekerjaan yang Kamu Inginkan</p><br/>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="text" class="form-control input-lg" name="nama"
                                           placeholder="Lowongan Pekerjaan"/>
                                </div>
                                <div class="col-md-2">
                                    <button type="Submit" class="btn btn-primary btn-fill btn-lg" style="height: 55px;">
                                        Cari Lowongan
                                    </button>
                                </div>
                            </div>-->
                            <!--<center>
                            <div class="row">
                                <div id="map" style="width:1920px; height:1080px"></div>
                            </div>
                            </center>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>

    </html>