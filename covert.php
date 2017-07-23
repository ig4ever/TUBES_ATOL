
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
    var lat = document.getElementById('lat').innerHTML = geo.lat();
    var lng = document.getElementById('lng').innerHTML = geo.lng();

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
<div id="maps" style="width: 800px; height: 400px;"></div><br>

<textarea id="alamat" style="width: 795px; resize:none;" placeholder="Hasilkan"></textarea>
<br>

<button onClick="cari_alamat()">CARI ALAMAT</button>

<strong>Latitude :</strong><span id="lat"></span>

<strong>Longitude :</strong><span id="lng"></span>

